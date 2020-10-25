<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Ixudra\Curl\Facades\Curl;
use BitWasp\Bitcoin\Address\AddressCreator;
use BitWasp\Bitcoin\Transaction\Factory\TxBuilder;
use App\Support\FcoinNetwork;
use Denpa\Bitcoin\Facades\Bitcoind;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','checksession','2fa'])->except(['proposal','proposalpost','proposalsubmit','vote']);
    }

    public function index()
    {
        return view('adminPanel/dashboard');
    }
    public function sendcoin(Request $request)
    {
    	$request->validate([
	            'send_to' => ['required'],
	            'send_amount' => ['required'],
	            'fee' => ['required','min:0.001'],
	        ]);
	    $sender = \App\Wallet::where('user_id',auth()->user()->id)->first();
	    $receiver =  $request->send_to;
	    $amount =  $request->send_amount; 
	    $fee =  $request->fee; 
	    
	    $validateaddress = Bitcoind::validateaddress($receiver)->get();
	    
	    if($validateaddress['isvalid']){
		    $txid = $this->sendmoney($sender->address,$receiver,$amount,$fee);
		    if($txid == 0) {
		        return redirect()->back()->with('error', 'Not have Sufficient Balance or Need higher Fee' );
		    } else {
		    	$txid = explode('_',$txid);
		    	$sender->balance = $sender->balance - ($amount+$fee);
		    	$sender->balancesell = $sender->balancesell + ($amount+$fee);
		    	$sender->lockedbalance = $sender->lockedbalance + $txid[0];
		    	$sender->save();
		    	
		    	\App\Transaction::insert(['user_id'=>$sender->user_id,'txid'=>$txid[1],'type'=>'Withdraw','amount'=>$amount,'confirmation'=>1]);
		    	\App\Transaction::insert(['user_id'=>$sender->user_id,'txid'=>$txid[1],'type'=>'Return Withdraw','amount'=>$txid[0],'confirmation'=>1]);
		    	
		    	return redirect()->back()->with('success', 'Success TXID : ' . $txid[1]);
		    }
	    } else {
	    	return redirect()->back()->with('error', 'Receiver Address is not valid');
	    } 
	    		
    }
    public function wallet()
    {
        return view('adminPanel/wallet');
    }
    public function accounts()
    {
        return view('adminPanel/accounts');
    }
    public function accountupdate(Request $request)
    {
    	if ($request->file('photo')->isValid()) {
	        $request->validate([
	            'photo' => ['required','file','mimes:jpeg,png','max:1024'],
	            'name' => ['required'],
	            'phone' => ['required'],
	        ]);
	
			$image = $request->file('photo');
			$name = time().'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('../html/images/user');
	        $image->move($destinationPath, $name);
	                
			\App\User::find(\Auth::User()->id)->update(['fullname'=> $request->name,'phone_number'=> $request->phone,'imgurl'=> $name ]);
			return redirect()->back()->with('success', 'Successfully Update Profile.');
		} else {
			return redirect()->back()->with('success', 'Successfully Update Profile.');	
		}
    }
    
    public function security()
    {
    	$user = \Auth::user();
        $google2fa = app('pragmarx.google2fa');
		if($user->google2fa_secret == NULL){
        	$secret = $google2fa->generateSecretKey();
        } else {
        	$secret = $user->google2fa_secret ;
        }
        
    	$QR_Image = $google2fa->getQRCodeInline(
            config('app.name'),
            $user->email,
            $secret
        );
        
        return view('adminPanel/security',[ 'QR_Image' => $QR_Image, 'secret' => $secret ]);
    }
    
    public function passchange(Request $request)
    {
    	$request->validate([
            'oldPassword' => ['required'],
            'newPassword' => ['required'],
            'confirmPassword' => ['required','same:newPassword'],
        ]);

		if(\Hash::check($request->oldPassword, auth()->user()->password)){
        	\App\User::find(\Auth::User()->id)->update(['password'=> \Hash::make($request->newPassword)]);
        	return redirect()->back()->with('success', 'Password Change Successfully.');
		} else {
			return redirect()->back()->with('error', 'Current Password Wrong.');
		}
        
    }
    public function enable2fa(Request $request)
    {
    	$request->validate([
            'password' => ['required'],
        ]);

		if(\Hash::check($request->password, auth()->user()->password)){
        	\App\User::find(\Auth::User()->id)->update(['google2fa_secret' => $request->fa2code]);
        	return redirect()->back()->with('success', 'Enable 2FA Successfully.');
		} else {
			return redirect()->back()->with('error', 'Current Password Wrong.');
		}
    }
    public function disable2fa(Request $request)
    {
        $request->validate([
            'password' => ['required'],
        ]);

		if(\Hash::check($request->password, auth()->user()->password)){
        	\App\User::find(\Auth::User()->id)->update(['google2fa_secret'=> NULL ]);
        	return redirect()->back()->with('success', 'Disable 2FA Successfully.');
		} else {
			return redirect()->back()->with('error', 'Current Password Wrong.');
		}
    }
    
    public function sendmoney($sender,$receiver,$amount,$fee){
    	
    	
    	$response = Bitcoind::listunspent(1,9999999,array($sender))->get();
    	$totalamount = 0;
    	
    	$senders = array();
    	$receivers = array();
    	$i=0;
        
        if(isset($response['txid'])){
        	$totalamount += $response['amount'] ;
        	$senders[$i]["txid"] = $response['txid'];
        	$senders[$i]["vout"] = $response['vout'];
        } else {
	        foreach($response as $res){
	    		$totalamount += $res['amount'] ;
	    		$senders[$i]["txid"] = $res['txid'];
	    		$senders[$i]["vout"] = $res['vout'];
	    		$i++;
	    		if($totalamount >= $amount){
	    			break;
	    		}
	    	}
	    }
    	
    	if($totalamount < $amount){
    		return 0;
    	}
    	
    	$receivers[$receiver] = (float)$amount;
    	if(($totalamount - ( $amount + $fee ))> 0 ){
	    	$receivers[$sender] = (float)($totalamount - ( $amount + $fee ));
	    }
	    
	    try {
	        $transaction = Bitcoind::createrawtransaction($senders,$receivers)->get();
		    $signtransaction = Bitcoind::signrawtransaction($transaction)->get();
		    $hash = Bitcoind::sendrawtransaction($signtransaction['hex'])->get();
	    } catch (\Exception $e) {
	        return 0;
	    }
	    
	    
		return $receivers[$sender] . '_' . $hash;
    }
    
    public function proposal()
    {
        return view('adminPanel/proposal');
    }
    
    public function proposalpost(Request $request)
    {
    	try {
	        $validate = Bitcoind::validateaddress($request->paymentAddrees)->get();
	        if($validate['isvalid']==0) {
	        	return redirect()->back()->with('error', 'Payment Address is not valid okay ?');
	        }
	    } catch (\Exception $e) {
	        return redirect()->back()->with('error', 'Payment Address is not valid');
	    }
	    $request->validate([
		            'title' => ['required'],
		            'description' => ['required'],
		            'document' => ['required','file','mimes:jpeg,png,pdf,doc,docx','max:1024'],
		            'category' => ['required'],
		            'paymentAddrees' => ['required'],
		            'payment' => ['required','numeric','min:1'],
		]);
        
		$image = $request->file('document');
		$name = time().'.'.$image->getClientOriginalExtension();
	    $destinationPath = public_path('../html/images/document');
	    $image->move($destinationPath, $name);
	    $start_time = \Carbon\Carbon::now()->timestamp;
	    
	    switch((int)$request->category){
	    	case 1: $multiplier = 30*60; break;
	    	case 2: $multiplier = 60*60; break;
	    	case 3: $multiplier = 2*60*60; break;
	    	case 4: $multiplier = 7*60*60; break;
	    	case 5: $multiplier = 14*60*60; break;
	    	case 6: $multiplier = 14*60*60; break;
	    	case 7: $multiplier = 30*60*60; break;
	    	default: $multiplier = 30*60; break;
	    }
	    $end_time = $start_time + $multiplier;
	    
	    $data = array('RequestAmount'=>$request->requestamount,'url'=>'http://reviewcapital.org/images/document/'.$name,'name'=>$request->title,'description'=>$request->description,'type'=>(int)$request->category,'payment_address'=>$request->paymentAddrees,'payment_amount'=>(float)$request->payment,'start_epoch'=>$start_time,'end_epoch'=>$end_time);    
		
		$hash = bin2hex(json_encode($data));
		
		try {
	        $object = Bitcoind::gobject('check',$hash)->get();
	        if($object == "OK") {
	        	$hash = 'gobject prepare 0 1 '. $start_time.' ' . $hash;
	        } else {
	        	return redirect()->back()->with('error', 'Check All Field is Valid');
	        }
	    } catch (\Exception $e) {
	        return redirect()->back()->with('error', 'Check All Field is Valid');
	    }
	    
		return view('adminPanel/proposalprepare',['hash'=>$hash]);
    }
    
    public function proposalsubmit(Request $request){
    	
    	if(empty($request->code) ){
    		return view('adminPanel/proposalprepare');
    	}
    	
    	if(empty($request->txid)){
    		return view('adminPanel/proposalprepare',['hash'=>$request->code]);
    	}
        
        $code = explode(' ',$request->code);
        
        try {
	        $hash = Bitcoind::gobject('submit',$code[2],$code[3],$code[4],$code[5],$request->txid)->get();
	    } catch (\Exception $e) {
	        return redirect()->route('proposalsubmit')->with('error', 'Wait Until 6 Confirmation & Valid Input')->with('txid',$request->code);
	    }
	    
        return redirect()->route('vote')->with('success', 'Successfully Propagate Your Proposal.');
    }
    public function vote()
    {
    	$proposals = Bitcoind::gobject('list')->get();
        return view('adminPanel/vote',['proposals'=>$proposals]);
    }
    
    public function history()
    {
        return view('adminPanel/history');
    }
}

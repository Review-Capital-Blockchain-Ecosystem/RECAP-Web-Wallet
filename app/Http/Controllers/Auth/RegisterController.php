<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use BitWasp\Bitcoin\Crypto\Random\Random;
use BitWasp\Bitcoin\Mnemonic\MnemonicFactory;
use BitWasp\Bitcoin\Mnemonic\Bip39\Bip39Mnemonic;
use App\Support\FcoinGenerator;
use Denpa\Bitcoin\Facades\Bitcoind;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
    	$random = new Random();
		$entropy = $random->bytes(Bip39Mnemonic::MIN_ENTROPY_BYTE_LEN);
		$bip39 = MnemonicFactory::bip39();
		$mnemonic = $bip39->entropyToMnemonic($entropy);
		
    	$name = $this->random_strings(6) . '-' ;
    	$name .= $this->random_strings(4) . '-' ;
    	$name .= $this->random_strings(4) . '-' ;
    	$name .= $this->random_strings(7) ;  
    	
    	$user = User::create([
            'name' => $name,
            'email' => $data['email'],
            'fullname' => $data['name'],
            'wordlist' => $mnemonic,
            'password' => Hash::make($data['password']),
        ]);
        
        $address = new FcoinGenerator($mnemonic);
    	
    	\App\Wallet::create(['user_id'=>$user->id,'balance'=>0,'address'=>$address->getaddress()]);
    	
    	Bitcoind::importprivkey($address->getprivkey(),'',false);
        
        return $user;
        
    }
    
    function random_strings($length_of_string) 
	{ 
	  
	    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
	  
	    return substr(str_shuffle($str_result),  
	                       0, $length_of_string); 
	} 
}

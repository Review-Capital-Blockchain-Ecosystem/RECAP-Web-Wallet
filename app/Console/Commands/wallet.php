<?php

namespace App\Console\Commands;

use Denpa\Bitcoin\Facades\Bitcoind;
use Illuminate\Console\Command;
use App\Transaction;

class wallet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wallet {txid}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Transaction Confirmations';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $txid = $this->argument('txid');
        $transaction = Bitcoind::gettransaction($txid)->get();

        foreach($transaction['details'] as $details){
        	if($details['category']=='receive'){
        		$address = \App\Wallet::where('address',$details['address'])->first();
        		if($address){
        			$tran = Transaction::where('txid',$txid)->where('user_id',$address->user_id)->first();
        			if(!$tran){
        				Transaction::insert(['user_id'=>$address->user_id,'txid'=>$txid,'type'=>'Deposit','amount'=>$details['amount']]);
        				
        				$wallet = \App\Wallet::where('user_id',$address->user_id)->first();
		        		$wallet->lockedbalance = $wallet->lockedbalance + $details['amount'];
		        		$wallet->save();
        			}
        		}
        	}
        }
        
    }
}

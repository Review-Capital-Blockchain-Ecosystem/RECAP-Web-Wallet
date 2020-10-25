<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Denpa\Bitcoin\Facades\Bitcoind;
use App\Transaction;

class deposit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deposit {hash}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'FCOIN Deposit System';

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
        $hash = $this->argument('hash');
        $block = Bitcoind::getblock($hash);
        foreach($block['tx'] as $txid){
        	echo $txid . PHP_EOL ;
        	$balances = Transaction::where('txid',$txid)->where('type','Deposit')->where('confirmation',0)->get();
        	foreach($balances as $balance){
        		$wallet = \App\Wallet::where('user_id',$balance->user_id)->first();
        		$wallet->balance = $wallet->balance + $balance->amount;
        		$wallet->balancebuy = $wallet->balancebuy + $balance->amount;
        		$wallet->lockedbalance = $wallet->lockedbalance - $balance->amount;
        		$wallet->save();
        		
        		$balance->confirmation = 1;
        		$balance->save();
        	}
        	
        	$balances = Transaction::where('txid',$txid)->where('type','Return Withdraw')->where('confirmation',0)->get();
        	foreach($balances as $balance){
        		$wallet = \App\Wallet::where('user_id',$balance->user_id)->first();
        		$wallet->lockedbalance = $wallet->lockedbalance - $balance->amount;
        		$wallet->save();
        		
        		$balance->confirmation = 1;
        		$balance->save();
        	}
        }
    }
}

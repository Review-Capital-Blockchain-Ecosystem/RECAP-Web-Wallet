<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = [
        'user_id', 'address', 'balance', 'balancebuy', 'balancesell' , 'lockedbalance'
    ];
    
    public function users()
    {
    	return $this->hasMany('\App\User');
    }
}

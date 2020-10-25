<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id', 'amount' , 'type' , 'confirmation' , 'txid'
    ];
    
    public function users()
    {
    	return $this->hasMany('\App\User');
    }
}

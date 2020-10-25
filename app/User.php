<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Lab404\AuthChecker\Models\HasLoginsAndDevices;
use Lab404\AuthChecker\Interfaces\HasLoginsAndDevicesInterface;

class User extends Authenticatable implements HasLoginsAndDevicesInterface
{
    use Notifiable, HasLoginsAndDevices; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','fullname', 'password','wordlist','session_details','device_allow','session_id','google2fa_secret','phone_number','imgurl'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function wallet()
	{
	    return $this->hasone('\App\Wallet');
	}
	
	public function transaction()
	{
	    return $this->hasmany('\App\Transaction');
	}
}

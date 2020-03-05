<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','ic_number', 'phone_number',
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

    public function motherOf()
    {
        return $this->hasMany('App\Cert', 'ic_ibu', 'ic_number');
    }

    public function fatherOf()
    {
        return $this->hasMany('App\Cert', 'ic_bapa', 'ic_number');
    }

    public function tboas()
    {
        return $this->hasMany('App\Tboa', 'user_id', 'id');
    }

}

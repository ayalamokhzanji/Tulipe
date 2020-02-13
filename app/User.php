<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name' ,'phone_number', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $appends =["role_id"];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function User_information()
    {
       return $this->hasOne('App\User_information');
    }

    public function media(){

        return $this->hasMany('App\Media');
    }
    
    public function getLocationNameAttribute(){

        return $this->role->role_id;
 
     }
     
    public function customers(){

        return $this->belongsToMany('App\Customer', 'reservations')->withPivot('quantity', 'date', 'period', 'amount', 'service_id')->using('App\Reservation');;
    }

    public function Post(){

        return $this->hasMany('App\Post');
    }

    public function services(){

        return $this->hasMany('App\Service');
    }



}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function type(){

        return $this->belongsTo('App\Type');
    }

    public function user(){

        return $this->belongsTo('App\User');
    }

    // public function reservations(){

    //     return $this->hasMany('App\Reservation');
    // }

    public function customers(){

        return $this->belongsToMany('App\Customer', 'reservations')->withPivot('quantity', 'date', 'period', 'amount')->using('App\Reservation');
    }
}
 
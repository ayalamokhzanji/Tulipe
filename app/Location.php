<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['location', 'longitude', 'latitude'];
    public function User_information(){

        return $this->hasMany('App\User_information');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_information extends Model
{   protected $fillable = [
    'user_id',  'phone_number2', 'facebook', 'description', 'image','location_id','capacity','price'
];
    public function user()
    {
    	return $this->belongsTo('App\User');
    }


    public function location(){

        return $this->belongsTo('App\Location');
    }
    
}

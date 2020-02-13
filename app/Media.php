<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
   
    protected $fillable = [
        'media', 'title', 'role'
    ];

    public function User(){

        return $this->belongsTo('App\User');
    }
}

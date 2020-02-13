<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Reservation extends Pivot
{
    public function service(){

        return $this->belongsTo('App\Service');
    }
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    public function provinces()
    {
        return $this->belongsTo('App\Province');
    } 
}

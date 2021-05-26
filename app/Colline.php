<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colline extends Model
{
    public function communes()
    {
        return $this->belongsTo('App\Commune');
    } 

}

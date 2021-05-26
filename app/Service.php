<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function fonctions()
    {
        return $this->hasMany('App\Fonction');
    } 
}

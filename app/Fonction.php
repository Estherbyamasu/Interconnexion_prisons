<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fonction extends Model
{
    public function services()
    {
        return $this->belongsTo('App\Service');
    } 
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Establecimientos extends Model
{
    public function empresa()
    {
        return $this->belongsTo('App\Empresas');
    }
    public function usuarios()
    {
        return $this->hasMany('App\Users');
    }
    public function platos()
    {
        return $this->hasMany('App\Platos');
    }
}

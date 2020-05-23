<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Establecimiento extends Model
{
    protected $table = 'establecimientos';

    public function empresa()
    {
        return $this->belongsTo('App\Empresa');
    }
    public function usuarios()
    {
        return $this->hasMany('App\Users');
    }
    public function platos()
    {
        return $this->hasMany('App\Plato');
    }
}

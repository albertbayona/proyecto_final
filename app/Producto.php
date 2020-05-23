<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    protected $table = 'productos';

    public function proveedor()
    {
        return $this->hasOne('App\Proveedor');
    }
    public function platos()
    {
        return $this->belongsToMany(Plato::class,'ingredientes','producto_id','plato_id');
    }

}

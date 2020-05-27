<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plato extends Model
{
    protected $table = 'platos';
    //
    public function establecimiento()
    {
        return $this->belongsTo('App\establecimientos');
    }
    public function platos_pedidos()
    {
        return $this->hasMany('App\Platopedido');
    }
    public function ingredientes()
    {
        return $this->belongsToMany(Producto::class,'ingredientes','plato_id','producto_id');
    }
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
    // recordar que esta relacionado con las dos tablas intermedias ESPERANDO CORREO DE TONI
}

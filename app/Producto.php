<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    protected $table = 'productos';
    protected $fillable=[
        'nombre',
        'en_stock' ,
        'minimo_recomendable',
        'proveedor_id',
        'establecimiento_id'
        ];

    public function proveedor()
    {
        return $this->belongsTo('App\Proveedor');
    }
    public function platos()
    {
        return $this->belongsToMany(Plato::class,'ingredientes','producto_id','plato_id');
    }
    public function establecimiento(){
        return $this->hasMany('App\Establecimiento');
    }
}

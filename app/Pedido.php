<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';
    protected $fillable = [

    ];
    //
    public function usuarios()
    {
        return $this->belongsTo('App\Users');
    }
    public function plato_pedidos()
    {
        return $this->hasMany('App\Platopedido');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plato_pedido extends Model
{
    //
    protected $table = 'platos_pedidos';
    public function plato()
    {
        return $this->belongsTo('App\Plato');
    }
    public function pedido()
    {
        return $this->belongsTo('App\Pedido');
    }
}

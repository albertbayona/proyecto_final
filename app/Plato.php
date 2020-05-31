<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plato extends Model
{
    protected $table = 'platos';
    //
    public function establecimiento()
    {
        return $this->belongsTo('App\establecimiento');
    }
    public function platos_pedidos()
    {
        return $this->hasMany('App\Plato_pedido');
    }
    public function ingredientes()
    {
        return $this->belongsToMany(Producto::class,'ingredientes','plato_id','producto_id');
    }
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function quedanIngredientes(){
        $ingredienteFaltante = [];
        foreach ($this->ingredientes as  $ingrediente){
            if($ingrediente->en_stock ==0){
                $ingredienteFaltante[]=$ingrediente;
            }
        }
        return $ingredienteFaltante;
    }
    // recordar que esta relacionado con las dos tablas intermedias ESPERANDO CORREO DE TONI
}

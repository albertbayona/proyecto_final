<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    //
    protected $table = 'proveedores';

    public function producto()
    {
        return $this->belongsTo('App\Producto');
    }
}

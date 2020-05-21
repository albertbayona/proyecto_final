<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    //
    public function proveedor()
    {
        return $this->hasOne('App\Proveedores');
    }
}

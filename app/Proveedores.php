<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    //
    public function producto()
    {
        return $this->belongsTo('App\Productos');
    }
}

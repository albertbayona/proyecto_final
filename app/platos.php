<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class platos extends Model
{
    //
    public function establecimiento()
    {
        return $this->belongsTo('App\Establecimientos');
    }
    // recordar que esta relacionado con las dos tablas intermedias ESPERANDO CORREO DE TONI
}

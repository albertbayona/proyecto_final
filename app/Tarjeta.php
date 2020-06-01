<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarjeta extends Model
{
    protected $table = 'tarjetas';
    protected $primaryKey = 'empresa_id';
    protected $fillable=['numero_tarjeta','titular_tarjeta','fecha_caducidad','CVV','empresa_id'];

    public function empresa()
    {
        return $this->belongsTo('App\Empresa');
    }
}

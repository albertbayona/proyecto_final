<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    //
    protected $table = 'proveedores';
    protected $fillable = [
        'nombre',
        'empresa',
        'telefono',
        'email',
        'establecimiento_id'
    ];

    public function productos()
    {
        return $this->hasMany('App\Producto');
    }
    public function establecimiento(){
        return $this->belongsTo('App\Establecimiento');
    }
}

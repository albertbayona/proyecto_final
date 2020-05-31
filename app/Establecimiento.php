<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Establecimiento extends Model
{
    protected $table = 'establecimientos';
    protected $fillable = [
        'nombre',
        'mesas',
        'pais',
        'provincia',
        'municipio',
        'calle',
        'empresa_id'
    ];

    public function empresa()
    {
        return $this->belongsTo('App\Empresa');
    }
    public function usuarios()
    {
        return $this->hasMany('App\User');
    }
    public function platos()
    {
        return $this->hasMany('App\Plato');
    }
    public function productos(){
        return $this->hasMany('App\Producto');
    }
    public function proveedores(){//necesitamos esta relacion o no podriamos crear un proveedor
        return $this->hasMany('App\Proveedor');
    }
}

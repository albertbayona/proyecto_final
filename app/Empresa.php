<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresas';
    protected $fillable = [
        'NIF',
        'nombre',
        'pais',
        'provincia',
        'municipio',
        'calle',
    ];
    public function establecimientos()
    {
        return $this->hasMany('App\establecimiento');
    }
    public function tarjeta()
    {
        return $this->hasOne('App\establecimientos');
    }

}

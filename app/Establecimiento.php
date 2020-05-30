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
}

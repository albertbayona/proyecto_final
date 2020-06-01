<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public function platos()
    {
        return $this->hasMany(Plato::class);
    }
}

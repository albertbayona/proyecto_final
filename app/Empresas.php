<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresas extends Model
{
    public function establecimientos()
    {
        return $this->hasMany('App\Establecimientos');
    }

}

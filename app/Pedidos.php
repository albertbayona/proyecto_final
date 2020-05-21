<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    //
    public function usuarios()
    {
        return $this->belongsTo('App\Users');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table="usuarios";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'email', 'password','apellidos','establecimiento_id','rol_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function establecimiento()
    {
        return $this->belongsTo('App\Establecimiento');
    }
    public function rol()
    {
        return $this->belongsTo('App\Rol');
    }
    public function pedidos()
    {
        return $this->hasMany('App\Pedido');
    }

    public function rolAutorizado($roles)
    {
        if ($this->tieneRol($roles)) {
            return true;
        }
        abort(401, 'Accion no autorizada');
    }

    public function tieneRol($rol)
    {
        if ($this->rol()->where('nombre', $rol)->first()) {
            return true;
        }
        return false;
    }
    public function empresa(){
        return $this->establecimiento()->first()->empresa;

    }

}

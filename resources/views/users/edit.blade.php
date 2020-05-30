@extends('layouts.app')

@section('content')
    <div class="body-form">
        <div class="card-form ">
            <form class="grid-user" method="POST" action="{{route('users.update',$user->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid-titulo height-c">
                    <div class=" derechaM20 arrow-left link">
                        <a href="{{route('users.index')}}"></a>
                    </div>
                    <h3 class="titulo ">Modificar usuario</h3>
                </div>

                <div class="grid-formulario">
                    <div class="grid-datos-personales">
                        <div class="grid-d-personal text-abajo"><h3>Datos personales</h3></div>
                        <div class="grid-nombre direction-column">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombre" value="{{$user->nombre}}">
                        </div>
                        <div class="grid-apellidos direction-column">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" name="apellidos" id="apellidos" value="{{$user->apellidos}}">
                        </div>
                    </div>
                    <div class="grid-contacto">
                        <div class="grid-d-contacto text-abajo"><h3>Datos de usuario</h3></div>
                        <div class="grid-email direction-column">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" value="{{$user->email}}">
                        </div>
                        <div class="grid-contrasenya  direction-column">
                            <label for="contrasenya">Contraseña</label>
                            <input type="password" name="contrasenya" id="contrasenya">
                        </div>
                        <div class="grid-telefono direction-column">
                            <label for="nombre">Teléfono</label>
                            <input type="text" name="telefono" id="telefono" value="{{$user->telefono}}">
                        </div>
                    </div>
                    <div class="grid-datos-empresa">
                        <div class="grid-d-empresa text-abajo"><h3>Datos de contacto</h3></div>
                        <div class="grid-establecimiento  direction-column">
                            <label for="establecimiento">Establecimiento</label>
                            <select name="establecimiento" id="establecimiento">
                                <option value="{{$user->establecimiento->id}}">{{$user->establecimiento->nombre}}</option>
                                @foreach($establecimientos as $establecimiento)
                                    @if ($user->establecimiento->id != $establecimiento->id)
                                        <option value="{{$establecimiento['id']}}">{{$establecimiento['nombre']}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="grid-rol direction-column">
                            <label for="rol">Rol</label>
                            <select name="rol" id="rol">
                                <option value="{{$user->rol->id}}">{{$user->rol->nombre}}</option>
                            @if($user->rol->id!=1)
                                @foreach($roles as $rol)
                                    @if ($user->rol->id != $rol->id)
                                        <option value="{{$rol['id']}}">{{$rol['nombre']}}</option>
                                    @endif
                                @endforeach
                            @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="grid-imagen">
                    <div class="grid-subir-foto">
{{--                        <input type="file" name="photo">--}}
                    </div>
                    <div class="grid-foto">
{{--                                                @svg('/svg/social.svg', 'accion-svg')--}}
                    </div>
                </div>
                <div class="grid-end-form">
                    <div class="grid-boton ">
                        <input type="submit" class="btn-primary" value="Modificar usuario">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
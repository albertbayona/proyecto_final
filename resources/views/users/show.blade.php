@extends('layouts.app')

@section('content')
    <div class="body-form">
        <div class="card-form ">
            <div class="grid-user" >

                <div class="grid-titulo height-c">
                    <div class=" derechaM20 arrow-left link">
                        <a href="{{route('users.index')}}"></a>
                    </div>
                    <h3 class="titulo ">Usuario: {{$user->nombre}} {{$user->apellidos}}</h3>
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
                    <div class="grid-contacto-show">
                        <div class="grid-d-contacto text-abajo"><h3>Datos de usuario</h3></div>
                        <div class="grid-email direction-column">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" value="{{$user->email}}">
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
                            </select>
                        </div>
                        <div class="grid-rol direction-column">
                            <label for="rol">Rol</label>
                            <select name="rol" id="rol">
                                <option value="{{$user->rol->id}}">{{$user->rol->nombre}}</option>
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
                        <a type="submit" class="btn-primary" href="{{route('users.index')}}">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
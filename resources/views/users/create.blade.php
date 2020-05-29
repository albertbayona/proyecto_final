@extends('layouts.app')grid-

@section('content')
    <div class="body-form">
        <div class="card-form ">
            <form class="grid-user" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="grid-titulo height-c">
                    <div class=" derechaM20 arrow-left link">
                        <a href="{{route('home')}}"></a>
                    </div>
                    <h3 class="titulo ">Gestion de usuarios</h3>
                </div>

                <div class="grid-formulario">
                    <div class="grid-datos-personales">
                        <div class="grid-d-personal text-abajo"><h3>Datos personales</h3></div>
                        <div class="grid-nombre direction-column">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombre">
                        </div>
                        <div class="grid-apellidos direction-column">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" name="apellidos" id="apellidos">
                        </div>
                    </div>
                    <div class="grid-contacto">
                        <div class="grid-d-contacto text-abajo"><h3>Datos de contacto</h3></div>
                        <div class="grid-email direction-column">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email">
                        </div>
                        <div class="grid-telefono direction-column">
                            <label for="nombre">Telefono</label>
                            <input type="text" name="telefono" id="telefono">
                        </div>
                    </div>
                    <div class="grid-datos-empresa">
                        <div class="grid-d-empresa text-abajo"><h3>Datos de contacto</h3></div>
                        <div class="grid-establecimiento  direction-column">
                            <label for="establecimiento">Establecimiento</label>
                            <select name="establecimiento" id="establecimiento">
                                @foreach($establecimientos as $establecimiento)
                                <option value="{{$establecimiento['id']}}">{{$establecimiento['nombre']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="grid-rol direction-column">
                            <label for="rol">Rol</label>
                            <select name="rol" id="rol">
                                @foreach($roles as $rol)
                                    <option value="{{$rol['id']}}">{{$rol['nombre']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="grid-imagen">
                    <div class="grid-subir-foto">
                        <input type="file"  name="photo">
                    </div>
                    <div class="grid-foto">
{{--                        @svg('/svg/social.svg', 'accion-svg')--}}
                    </div>
                </div>
                <div class="grid-end-form">
                    <div class="grid-boton ">
                        <input type="submit" class="btn-primary" value="Crear usuario">
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
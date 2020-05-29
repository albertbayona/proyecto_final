@extends('layouts.app')

@section('content')
    <div class="body-form">
        <div class="card-form ">
            <div class="grid-user">
                <div class="grid-titulo height-c">
                    <div class=" derechaM20 arrow-left link">
                        <a href="{{route('home')}}"></a>
                    </div>
                    <h3 class="titulo ">Gestion de usuarios</h3>
                </div>
                <div class="grid-formulario">
                    <div class="grid-datos-personales">
                        <div class="grid-datos-personales"><h3>Datos personales</h3></div>
                        <div class="grid-nombre">
                            <label>Nombre
                                <input type="text"/>
                            </label>
                        </div>
                        <div class="grid-apellidos">
                            <label>Apellidos
                                <input type="text"/>
                            </label>
                        </div>
                    </div>
                    <div class="grid-contacto"></div>
                    <div class="grid-datos-empresa"></div>
                </div>

                <div class="grid-end-form">
                    <div class="grid-boton"></div>
                </div>
                <div class="grid-imagen">
                    <div class="grid-subir-foto"></div>
                    <div class="grid-foto"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
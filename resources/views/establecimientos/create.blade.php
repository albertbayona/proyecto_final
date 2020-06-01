@extends('layouts.app')

@section('content')
    <div class="body-form">
        <div class="card-form ">
            <form class="grid-establecimiento-grid-container form-95" method="POST" action="{{route('establecimientos.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="grid-establecimiento-titulo text-abajo">
                    <div class="height-c">
                        <div class=" derechaM20 arrow-left link">
                            <a href="{{route('establecimientos.index')}}"></a>
                        </div>
                        <h3 class="titulo ">Crear establecimiento</h3>
                    </div>

                </div>
                <div class="grid-establecimiento-form">
                    <div class="grid-establecimiento-datos-establecimiento">
                        <div class="grid-establecimiento-datos-d-establecimiento text-abajo">
                            <h3>Datos del establecimiento</h3>
                        </div>
                        <div class="grid-establecimiento-nombre direction-column">
                            <label for="nombre">Nombre del establecimiento</label>
                            <input type="text" name="nombre" id="nombre" >
                        </div>
                        <div class="grid-establecimiento-mesas direction-column">
                            <label for="mesas">Mesas</label>
                            <input type="number" name="mesas" id="mesas" >
                        </div>
                    </div>
                    <div class="grid-establecimiento-datos-direccion1">
                        <div class="grid-establecimiento-datos-d-direccion text-abajo">
                            <h3>Direccion</h3>
                        </div>
                        <div class="grid-establecimiento-pais direction-column">
                            <label for="pais">Pais</label>
                            <input type="text" name="pais" id="pais" >
                        </div>
                        <div class="grid-establecimiento-provincia direction-column">
                            <label for="provincia">Provincia</label>
                            <input type="text" name="provincia" id="provincia" >
                        </div>
                        <div class="grid-establecimiento-municipio direction-column">
                            <label for="municipio">Municipio</label>
                            <input type="text" name="municipio" id="municipio" >
                        </div>
                    </div>
                    <div class="grid-establecimiento-datos-direccion2">
                        <div class="grid-establecimiento-codigo-postal direction-column">
                            <label for="codigo_postal">Codigo postal</label>
                            <input type="text" name="codigo_postal" id="codigo_postal" >
                        </div>
                        <div class="grid-establecimiento-calle direction-column">
                            <label for="calle">Calle</label>
                            <input type="text" name="calle" id="calle" >
                        </div>
                    </div>
                </div>
                <div class="grid-establecimiento-imagen">
                    <div class="grid-establecimiento-foto"></div>
                    <div class="grid-establecimiento-subir-foto"></div>
                </div>

                <div class="grid-establecimiento-end-form">
                    <div class="grid-establecimiento-boton">
                        <input type="submit" class="btn-primary" value="Crear establecimiento">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="body-form">
        <div class="card-form ">
            <form class="grid-empresa-grid-container form-95" method="POST" action="{{route('configuracion.update')}}" >
                @method('PUT')
                @csrf
                <div class="grid-empresa-titulo height-c text-abajo">
                    <div class=" derechaM20 arrow-left link">
                        <a href="{{route('home')}}"></a>
                    </div>
                    <h3 class="titulo ">Configuracion</h3>
                </div>

                <div class="grid-empresa-form">
                    <div class="grid-empresa-datos-empresa text-abajo">
                        <h3>Datos de la empresa</h3>
                    </div>
                    <div class="grid-empresa-pais direction-column">
                        <label for="pais">País</label>
                        <input type="text" name="pais" id="pais" value="{{$empresa->pais}}" >
                    </div>
                    <div class="grid-empresa-provincia direction-column">
                        <label for="provincia">Provincia</label>
                        <input type="text" name="provincia" id="provincia" value="{{$empresa->provincia}}" >
                    </div>
                    <div class="grid-empresa-municipio direction-column">
                        <label for="municipio">Municipio</label>
                        <input type="text" name="municipio" id="municipio" value="{{$empresa->municipio}}" >
                    </div>
                    <div class="grid-empresa-codigo_postal direction-column">
                        <label for="codigo_postal">Codigo postal</label>
                        <input type="text" name="codigo_postal" id="codigo_postal" value="{{$empresa->codigo_postal}}" >
                    </div>
                    <div class="grid-empresa-calle direction-column">
                        <label for="calle">Calle</label>
                        <input type="text" name="calle" id="calle" value="{{$empresa->calle}}" >
                    </div>
                    <div class="grid-empresa-NIF direction-column">
                        <label for="NIF">NIF</label>
                        <input type="text" name="NIF" id="NIF" value="{{$empresa->NIF}}" >
                    </div>
                    <div class="grid-empresa-datos-tarjeta text-abajo">
                        <h3>Datos de la tarjeta</h3>
                    </div>
                    <div class="grid-empresa-numero_tarjeta direction-column">
                        <label for="numero_tarjeta">Número de tarjeta</label>
                        <input type="text" name="numero_tarjeta" id="numero_tarjeta" value="
                        @if($tarjeta != null)
                            {{$tarjeta->numero_tarjeta}}
                        @endif
                        " >
                    </div>
                    <div class="grid-empresa-titular_tarjeta direction-column">
                        <label for="titular_tarjeta">Titular de la tarjeta</label>
                        <input type="text" name="titular_tarjeta" id="titular_tarjeta" value="
                        @if($tarjeta != null)
                            {{$tarjeta->titular_tarjeta}}
                        @endif
                        " >

                    </div>
                    <div class="grid-empresa-fecha_caducidad direction-column">
                        <label for="fecha_caducidad">Fecha caducidad</label>
                        <input type="text" name="fecha_caducidad" id="fecha_caducidad" value="
                        @if($tarjeta != null)
                        {{$tarjeta->fecha_caducidad}}
                        @endif
                        " >
                    </div>
                    <div class="grid-empresa-CVV direction-column">
                        <label for="CVV">CVV</label>
                        <input type="text" name="CVV" id="CVV" value="
                        @if($tarjeta != null)
                        {{$tarjeta->CVV}}
                        @endif
                        " >
                    </div>
                </div>
                <div class="grid-empresa-end-form">
                    <div class="grid-empresa-boton">
                        <input type="submit" class="btn-primary" value="Guardar configuracion">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="body-form">
        <div class="card-form ">
            <form class="grid-proveedores-grid-container form-95" method="POST" action="{{route('proveedores.update',$proveedor->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid-proveedores-titulo text-abajo">
                    <div class="height-c">
                        <div class=" derechaM20 arrow-left link">
                            <a href="{{route('proveedores.index')}}"></a>
                        </div>
                        <h3 class="titulo ">Gestión de proveedores</h3>
                    </div>
                </div>

                <div class="grid-proveedores-imagen">
                    <div class="grid-proveedores-foto"></div>
                    <div class="grid-proveedores-subir-foto"></div>
                </div>
                <div class="grid-proveedores-form">
                    <div class="grid-proveedores-datos-empleado text-abajo">
                        <h3>Datos del proveedor</h3>
                    </div>
                    <div class="grid-proveedores-nombre direction-column">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" value="{{$proveedor->nombre}}">
                    </div>
                    <div class="grid-proveedores-empresa direction-column">
                        <label for="empresa">Empresa</label>
                        <input type="text" name="empresa" id="empresa"  value="{{$proveedor->empresa}}">
                    </div>
                    <div class="grid-proveedores-datos-contacto text-abajo">
                        <h3>Datos de contacto</h3>
                    </div>
                    <div class="grid-proveedores-email direction-column">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email"  value="{{$proveedor->email}}">
                    </div>
                    <div class="grid-proveedores-telefono direction-column">
                        <label for="telefono">Teléfono</label>
                        <input type="text" name="telefono" id="telefono"  value="{{$proveedor->telefono}}">
                    </div>
                </div>
                <div class="grid-proveedores-end-form">
                    <div class="grid-proveedores-boton">
                        <input type="submit" class="btn-primary" value="Crear proveedor">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script>

    </script>
@endsection

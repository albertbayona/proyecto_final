@extends('layouts.app')

@section('content')
    <div class="body-form">
        <div class="card-form ">
            <form class="grid-producto-grid-container form-95" method="POST" action="{{route('inventario.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="grid-producto-titulo text-abajo">
                    <div class="height-c">
                        <div class=" derechaM20 arrow-left link">
                            <a href="{{route('inventario.index')}}"></a>
                        </div>
                        <h3 class="titulo ">Crear producto</h3>
                    </div>
                </div>
                <div class="grid-producto-formulario">
                    <div class="grid-producto-datos-producto text-abajo">
                        <h3>Datos del producto</h3>
                    </div>
                    <div class="grid-producto-nombre direction-column">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" >
                    </div>
                    <div class="grid-producto-cantidad direction-column">
                        <label for="en_stock">En stock</label>
                        <input type="text" name="en_stock" id="en_stock" >
                    </div>
                    <div class="grid-producto-cantidad-minima direction-column">
                        <label for="minimo_recomendable">Cantidad mínima recomendable</label>
                        <input type="text" name="minimo_recomendable" id="minimo_recomendable" >
                    </div>
                    <div class="grid-producto-datos-proveedor text-abajo">
                        <h3>Datos del proveedor</h3>
                    </div>
                    <div class="grid-producto-proveedor direction-column">
                        <select name="proveedor_id" id="proveedor_id">
                            <option value=""> --- NADIE ---</option>
                        @foreach($proveedores as $proveedor)
                                <option value="{{$proveedor->id}}"> {{$proveedor->nombre}}({{$proveedor->empresa}})</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="grid-producto-end-form">
                    <div class="grid-producto-boton">
                        <input type="submit" class="btn-primary" value="Crear producto">
                    </div>
                </div>
                <div class="grid-producto-imagen">
                    <div class="grid-producto-subir-foto"></div>
                    <div class="grid-producto-foto"></div>
                </div>
            </form>
        </div>
    </div>
@endsection

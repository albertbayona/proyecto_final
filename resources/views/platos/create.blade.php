@extends('layouts.app')

@section('content')
    <div class="body-form">
        <div class="card-form ">
            <form class="grid-menu-grid-container form-95" method="POST" action="{{route('platos.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="grid-menu-titulo text-abajo">
                    <div class="height-c">
                        <div class=" derechaM20 arrow-left link">
                            <a href="{{route('platos.index')}}"></a>
                        </div>
                        <h3 class="titulo ">Crear plato</h3>
                    </div>
                </div>

                <div class="grid-menu-imagen">
                    <div class="grid-menu-foto"></div>
                    <div class="grid-menu-subir-foto"></div>
                </div>
                <div class="grid-menu-form">
                    <div class="grid-menu-nombre direction-column">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" >
                    </div>
                    <div class="grid-menu-precio direction-column">
                        <label for="precio">Precio</label>
                        <input type="text" name="precio" id="precio" >
                    </div>
                    <div class="grid-menu-categoria direction-column">
                        <label for="categoria">Categoría</label>
                        <select type="text" name="categoria" id="categoria" >
                            <option value=""> ---</option>
                            @foreach($categorias as $categoria)
                                <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="grid-menu-ingrediente direction-column">
                        <label for="ingrediente">Buscar ingrediente</label>
                        <select type="text" id="ingrediente" name="ingrediente" id="ingrediente" >
                            <option value=""> ---</option>
                        @foreach($productos as $producto)
                            <option value="{{$producto->nombre}}">{{$producto->nombre}}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="grid-menu-ingredientes direction-column">
                        <label for="ingredientes">Ingredientes</label>
                        <input type="text" id="ingredientes" name="ingredientes" id="ingredientes" >
                    </div>

                </div>
                <div class="grid-menu-end-form">
                    <div class="grid-menu-boton">
                        <input type="submit" class="btn-primary" value="Crear plato">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $( document ).ready(function() {

            $("#ingrediente").on("change",function () {
                if($('#ingredientes').val()==""){
                    $('#ingredientes').val( $(this).val());

                }else{
                    $('#ingredientes').val( $('#ingredientes').val()+';'+$(this).val());

                }
            });

        });
    </script>
@endsection

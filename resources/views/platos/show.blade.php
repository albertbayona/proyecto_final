@extends('layouts.app')

@section('content')
    <div class="body-form">
        <div class="card-form ">
            <div class="grid-menu-grid-container form-95" >
                @csrf
                @method("PUT")
                <div class="grid-menu-titulo text-abajo">
                    <div class="height-c">
                        <div class=" derechaM20 arrow-left link">
                            <a href="{{route('platos.index')}}"></a>
                        </div>
                        <h3 class="titulo ">Plato: {{$plato->nombre}}</h3>
                    </div>
                </div>

                <div class="grid-menu-imagen">
                    <div class="grid-menu-foto"></div>
                    <div class="grid-menu-subir-foto"></div>
                </div>
                <div class="grid-menu-form">
                    <div class="grid-menu-nombre direction-column">
                        <label for="nombre">Nombre</label>
                        <input disabled type="text" name="nombre" id="nombre" value="{{$plato->nombre}}">
                    </div>
                    <div class="grid-menu-precio direction-column">
                        <label for="precio">Precio</label>
                        <input disabled type="text" name="precio" id="precio" value="{{$plato->precio}}">
                    </div>
                    <div class="grid-menu-categoria direction-column">
                        <label for="categoria">Categoría</label>
                        <select type="text" name="categoria" id="categoria" >
                            <option value="{{$plato->categoria->id}}">{{$plato->categoria->nombre}}</option>
                            @foreach($categorias as $categoria)
                                @if( $categoria->id!=$plato->categoria->id)
                                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>

                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="grid-menu-ingredientes direction-column">
                        <label for="ingredientes">Ingredientes</label>
                        <input disabled type="text" id="ingredientes" name="ingredientes" id="ingredientes" value="{{$ingredientes}}" >
                    </div>

                </div>
                <div class="grid-menu-end-form">
                    <div class="grid-menu-boton">
                        <a type="submit" class="btn-primary" href="{{route('platos.index')}}">Volver</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


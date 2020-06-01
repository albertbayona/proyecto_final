@extends('layouts.app')

@section('content')
    <div class="body">
        <div class="titulo-linia">
            <div class="height-c">
                <div class=" derechaM20 arrow-left link">
                    <a href="{{route('home')}}"></a>
                </div>
                <h3 class="titulo ">Gestión de inventario</h3>
            </div>
            <div class="btn-primary btn-anyadir link"><span class="anyadir">+</span><a href="{{route('inventario.create')}}">Añadir producto</a></div>
        </div>
        <div class="table arriba20">
            <div class="th">Producto</div>
            <div class="th">En stock</div>
            <div class="th">Recomendable en reserva</div>
            <div class="th">Acciones</div>

            <div class="espacio-blanco"></div>

            @foreach($productos as $producto)
                @if($producto->minimo_recomendable>=$producto->en_stock)
                    <div class="td-danger">
                        Reservas bajas: {{$producto->nombre}}
                    </div>
                    <div class="td-danger">{{$producto->en_stock}}</div>
                    <div class="td-danger">{{$producto->minimo_recomendable}}</div>
                    <div class="td-danger acciones">
                        @if($producto->proveedor!=null)
                            <div class="link tooltip">

                                <span class="tooltiptext">Proveedor</span>
                                <a href="{{route('proveedores.show',$producto->proveedor->id)}}"></a>
                                @else
                                    <div class=" tooltip">
                                        <span class="tooltiptext">No tiene proveedor</span>
                                        @endif
                                        @svg('/svg/interface-libreta.svg', 'accion-svg')
                        </div>
                        <div class="link tooltip">
                            <span class="tooltiptext">Ver</span>
                            <a href="{{route('inventario.show',['inventario' => $producto->id])}}"></a>
                            @svg('/svg/interface.svg', 'accion-svg')
                        </div>
                        <div class="link tooltip">
                            <span class="tooltiptext">Editar</span>
                            <a href="{{route('inventario.edit',['inventario' => $producto->id])}}"></a>
                            @svg('/svg/tool.svg', 'accion-svg')
                        </div>
                        <div class="borrar">
                            <a class="borrar-input tooltip" href="{{ route('inventario.destroy',['inventario' => $producto->id]) }}"
                               onclick="event.preventDefault();
                                       document.getElementById('borrar-form{{$producto->id}}').submit();">
                                <span class="tooltiptext">Borrar</span>
                                @svg('/svg/delete.svg', 'accion-svg')
                            </a>
                            <form id="borrar-form{{$producto->id}}" action="{{ route('inventario.destroy',['inventario' => $producto->id]) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </div>
                @else
                    <div class="td">{{$producto->nombre}}</div>
                    <div class="td">{{$producto->en_stock}}</div>
                    <div class="td">{{$producto->minimo_recomendable}}</div>
                    <div class="td acciones">
                        @if($producto->proveedor!=null)
                            <div class="link tooltip">

                                <span class="tooltiptext">Proveedor</span>
                                <a href="{{route('proveedores.show',$producto->proveedor->id)}}"></a>
                        @else
                            <div class=" tooltip">
                                <span class="tooltiptext">No tiene proveedor</span>
                        @endif
                            @svg('/svg/interface-libreta.svg', 'accion-svg')
                        </div>
                        <div class="link tooltip">
                            <span class="tooltiptext">Ver</span>
                            <a href="{{route('inventario.show',['inventario' => $producto->id])}}"></a>
                            @svg('/svg/interface.svg', 'accion-svg')
                        </div>
                        <div class="link tooltip">
                            <span class="tooltiptext">Editar</span>
                            <a href="{{route('inventario.edit',['inventario' => $producto->id])}}"></a>
                            @svg('/svg/tool.svg', 'accion-svg')
                        </div>
                        <div class="borrar">
                            <a class="borrar-input tooltip" href="{{ route('inventario.destroy',['inventario' => $producto->id]) }}"
                               onclick="event.preventDefault();
                                       document.getElementById('borrar-form{{$producto->id}}').submit();">
                                <span class="tooltiptext">Borrar</span>
                                @svg('/svg/delete.svg', 'accion-svg')
                            </a>
                            <form id="borrar-form{{$producto->id}}" action="{{ route('inventario.destroy',['inventario' => $producto->id]) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection

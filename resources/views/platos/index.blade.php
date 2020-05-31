@extends('layouts.app')

@section('content')
    <div class="body">
        <div class="titulo-linia">
            <div class="height-c">
                <div class=" derechaM20 arrow-left link">
                    <a href="{{route('home')}}"></a>
                </div>
                <h3 class="titulo ">Gestión de menú</h3>
            </div>
            <div class="btn-primary btn-anyadir link"><span class="anyadir">+</span><a href="{{route('platos.create')}}">Añadir plato</a></div>
        </div>
        <div class="table arriba20">
            <div class="th">Plato</div>
            <div class="th">Precio</div>
            <div class="th">Ingredientes que faltan</div>
            <div class="th">Acciones</div>

            <div class="espacio-blanco"></div>

            @foreach($platos as $plato)
                @if($plato->quedanIngredientes()!=[])
                    <div class="td-danger">
                        Faltan Ingredientes: {{$plato->nombre}}
                    </div>
                    <div class="td-danger">{{$plato->precio}}</div>
                    <div class="td-danger">
                        @foreach($plato->quedanIngredientes() as $ingrediente)
                            {{$ingrediente->nombre}},
                        @endforeach
                    </div>
                    <div class="td-danger acciones">
                @else
                    <div class="td">{{$plato->nombre}}</div>
                    <div class="td">{{$plato->precio}}</div>
                    <div class="td">{{$plato->minimo_recomendable}}</div>
                    <div class="td acciones">
                @endif
                        <div class="link tooltip">
                            <span class="tooltiptext">Ver</span>
                            <a href="{{route('platos.show',['plato' => $plato->id])}}"></a>
                            @svg('/svg/interface.svg', 'accion-svg')
                        </div>
                        <div class="link tooltip">
                            <span class="tooltiptext">Editar</span>
                            <a href="{{route('platos.edit',['plato' => $plato->id])}}"></a>
                            @svg('/svg/tool.svg', 'accion-svg')
                        </div>
                        <div class="borrar">
                            <a class="borrar-input tooltip" href="{{ route('platos.destroy',['plato' => $plato->id]) }}"
                               onclick="event.preventDefault();
                                       document.getElementById('borrar-form{{$plato->id}}').submit();">
                                <span class="tooltiptext">Borrar</span>
                                @svg('/svg/delete.svg', 'accion-svg')
                            </a>
                            <form id="borrar-form{{$plato->id}}" action="{{ route('platos.destroy',['plato' => $plato->id]) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </div>
            @endforeach
        </div>
    </div>
@endsection

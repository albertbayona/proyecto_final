@extends('layouts.app')

@section('content')
    <div class="body">
        <div class="titulo-linia">
            <div class="height-c">
                <div class=" derechaM20 arrow-left link">
                    <a href="{{route('home')}}"></a>
                </div>
                <h3 class="titulo ">Gestión de establecimientos</h3>
            </div>
            <div class="btn-primary btn-anyadir link"><span class="anyadir">+</span><a href="{{route('establecimientos.create')}}">Añadir establecimiento</a></div>
        </div>
        <div class="table arriba20">
            <div class="th">Establecimiento</div>
            <div class="th">Mesas</div>
            <div class="th">Numero empleados</div>
            <div class="th">Acciones</div>

            <div class="espacio-blanco"></div>

            @foreach($establecimientos as $establecimiento)
            <div class="td ">{{$establecimiento->nombre}}</div>
            <div class="td">{{$establecimiento->mesas}}</div>
            <div class="td">{{$establecimiento->usuarios->count()}}</div>
            <div class="td acciones">
                <div class="link tooltip">
                    <span class="tooltiptext">Ver</span>
                    <a href="{{route('establecimientos.show',['establecimiento' => $establecimiento->id])}}"></a>
                    @svg('/svg/interface.svg', 'accion-svg')
                </div>
                <div class="link tooltip">
                    <span class="tooltiptext">Editar</span>
                    <a href="{{route('establecimientos.edit',['establecimiento' => $establecimiento->id])}}"></a>
                    @svg('/svg/tool.svg', 'accion-svg')
                </div>
                <div class="borrar">
                    <a class="borrar-input tooltip" href="{{ route('establecimientos.destroy',['establecimiento' => $establecimiento->id]) }}"
                       onclick="event.preventDefault();
                               document.getElementById('borrar-form{{$establecimiento->id}}').submit();">
                        <span class="tooltiptext">Borrar</span>
                        @svg('/svg/delete.svg', 'accion-svg')
                    </a>
                    <form id="borrar-form{{$establecimiento->id}}" action="{{ route('establecimientos.destroy',['establecimiento' => $establecimiento->id]) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>

            </div>
            @endforeach
        </div>
    </div>
@endsection

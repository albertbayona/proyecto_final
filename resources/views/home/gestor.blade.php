@extends('layouts.app')

@section('content')
    <div class="main-menu">
        <div class="text-center main-btn link direction-column">
            <div>
                @svg('/svg/box.svg', 'main-svg')
            </div>
            <a class="anchor-oscura" href="{{route('inventario.index')}}">Inventario</a>
        </div>

        <div class="text-center main-btn link direction-column">
            <div>
                @svg('/svg/fast-food.svg', 'main-svg')
            </div>
            <a  class="anchor-oscura" href="{{route('platos.index')}}">Menú</a>
        </div>
        <div class="text-center main-btn link direction-column">
            <div>
                @svg('/svg/interface-libreta.svg', 'main-svg')
            </div>
            <a  class="anchor-oscura"  href="{{route('proveedores.index')}}">Proveedores</a>
        </div>
    </div>
@endsection

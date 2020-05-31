@extends('layouts.app')

@section('content')
    <div class="main-menu">
        <div class="text-center main-btn link direction-column">
            @svg('/svg/box.svg', 'main-svg')
            <a class="anchor-oscura" href="{{route('inventario.index')}}">Inventario</a>
        </div>

        <div class="text-center main-btn link direction-column">
            @svg('/svg/fast-food.svg', 'main-svg')
            <a  class="anchor-oscura" href="{{route('platos.index')}}">Menú</a>
        </div>
        <div class="text-center main-btn link direction-column">
            @svg('/svg/interface-libreta.svg', 'main-svg')
            <a  class="anchor-oscura"  href="{{route('proveedores.index')}}">Proveedores</a>
        </div>
    </div>
@endsection

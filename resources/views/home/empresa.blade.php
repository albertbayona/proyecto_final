@extends('layouts.app')

@section('content')
    <div class="main-menu">
        <div class="text-center main-btn link">
            @svg('/svg/social.svg', 'main-svg')
            <a class="anchor-oscura" href="{{route('users.index')}}">Usuarios</a>
        </div>

        <div class="text-center main-btn link">
            @svg('/svg/home-run.svg', 'main-svg')
            <a  class="anchor-oscura" href="{{route('establecimientos.index')}}">Establecimientos</a>
        </div>

        <div class="text-center main-btn link">
            @svg('/svg/tools-and-utensils.svg', 'main-svg')
{{--            <a  class="anchor-oscura"  href="{{route('configuracion.index')}}">Configuracion</a>--}}
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="main-menu">
        <div class="text-center main-btn link">
            <div>
                @svg('/svg/social.svg', 'main-svg')
            </div>
            <a class="anchor-oscura" href="{{route('users.index')}}">Usuarios</a>
        </div>

        <div class="text-center main-btn link">
            <div>
                @svg('/svg/home-run.svg', 'main-svg')
            </div>
            <a  class="anchor-oscura" href="{{route('establecimientos.index')}}">Establecimientos</a>
        </div>

        <div class="text-center main-btn link">
            <div>
                @svg('/svg/tools-and-utensils.svg', 'main-svg')
            </div>
            <a  class="anchor-oscura"  href="{{route('configuracion')}}">Configuracion</a>
        </div>
    </div>
@endsection

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@extends('layouts.head_imports')
@section('scripts')
    @yield('scripts')
@endsection

<body>
<nav class="navbar">
    @guest
        <div class="logo-blanco nav-logo link"><a href="{{ route('welcome') }}" class="logo-blanco nav-logo">Rest</a></div>
    @else
        <div class="logo-blanco nav-logo link"><a href="{{ route('home') }}" class="logo-blanco nav-logo">Rest</a></div>
    @endguest
<!-- Right Side Of Navbar -->
    <ul class="head-derecha">
        <!-- Authentication Links -->
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Registrate</a>
                </li>
            @endif
        @else
            @if(Auth::user()->tieneRol("empresa"))

            <li class="nav-item dropdown link mediaquery-hide">
                <a href="{{route("users.index")}}">Usuarios</a>
            </li>
            <li class="nav-item dropdown link mediaquery-hide">
                <a href="{{route("establecimientos.index")}}">Establecimientos</a>
            </li>
            <li class="nav-item dropdown link mediaquery-hide">
                <a href="{{route("configuracion")}}">Configuracion</a>
            </li>
            @elseif(Auth::user()->tieneRol("gestor"))

            <li class="nav-item dropdown link mediaquery-hide">
                <a href="{{route("inventario.index")}}">Inventario</a>
            </li>
            <li class="nav-item dropdown link mediaquery-hide">
                <a href="{{route("platos.index")}}">Menú</a>
            </li>
            <li class="nav-item dropdown link mediaquery-hide">
                <a href="{{route("proveedores.index")}}">Proveedores</a>
            </li>
            @endif
                <div class="letra-blanca" href="#" data-toggle="dropdown"
                     aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->nombre }} <span class="caret"></span>
                </div>
            <li class="nav-item dropdown">

                <a class="post" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    Salir
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        @endguest
    </ul>
</nav>
<main class="content">
    @yield('content')
</main>
</body>
</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@extends('layouts.head_imports')
@section('scripts')
    @yield('scripts')
@endsection

<body>
<nav class="navbar">
    @guest
        <div class="logo-blanco nav-logo link"><a href="{{ route('welcome') }}" class="logo-blanco nav-logo">Logo</a></div>
    @else
        <div class="logo-blanco nav-logo link"><a href="{{ route('home') }}" class="logo-blanco nav-logo">Logo</a></div>
    @endguest
<!-- Right Side Of Navbar -->
    <ul class="derecha derechaM40 height100 height-c">
        <!-- Authentication Links -->
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
            <div class="letra-blanca" href="#" data-toggle="dropdown"
                 aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->nombre }} <span class="caret"></span>
            </div>
            <li class="nav-item dropdown">

                <a class="post" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
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

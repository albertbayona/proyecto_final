<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@extends('layouts.head_imports')
<body>
<nav class="navbar">
    @guest
        <a href="{{ route('welcome') }}" class="logo-blanco nav-logo">Logo</a>
    @else
        <div class="logo-blanco nav-logo">Logo</div>
    @endguest
<!-- Right Side Of Navbar -->
    <ul class="derecha height100 height-c">
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

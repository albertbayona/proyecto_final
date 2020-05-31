@extends('layouts.app')

@section('content')
    <div class="welcome-background height100 center center-align">
        <div class="welcome-btn center-align">
            <div class="welcome-btn-text link" >
                <h3>gestióna <br>tu restaurante facilmente</h3>
                <a  href="{{route('login')}}">Empieza ya tu prueba gratuita</a>
            </div>
        </div>
    </div>
@endsection


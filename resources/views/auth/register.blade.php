@extends('layouts.app')

@section('content')
    <div class="center arriba20">
        <div class="card-login " >
            <div class="logo-naranja center height100">Rest</div>
                <form method="POST" class="form-login" action="{{ route('register') }}">
                    @csrf
                    <h3>Datos de empresa</h3>
                    <div class="">
                        <label for="nombre" class="">Nombre</label>

                        <div class="col-md-6">
                            <input id="nombre" type="text" class="width100 @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>

                            @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="NIF" >NIF</label>

                        <div class="col-md-6">
                            <input id="NIF" type="text" class="width100 @error('NIF') is-invalid @enderror" name="NIF" value="{{ old('NIF') }}" required autocomplete="NIF" autofocus>

                            @error('NIF')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="">
                        <label for="nombre_establecimiento" class="">Nombre del establecimiento</label>
                        <div class="col-md-6">
                            <input id="nombre_establecimiento" type="text" class="width100 @error('nombre_establecimiento') is-invalid @enderror" name="nombre_establecimiento" value="{{ old('nombre_establecimiento') }}" required autocomplete="nombre_establecimiento" autofocus>

                            @error('nombre_establecimiento')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <h3 class="arriba20 abajo5">Datos del usuario</h3>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="width100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="width100 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" >{{ __('Confirm Password') }}</label>

                        <div >
                            <input id="password-confirm" type="password" class="width100" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn-primary btn-login arriba20">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
@endsection

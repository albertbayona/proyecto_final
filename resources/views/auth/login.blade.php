@extends('layouts.app')

@section('content')
<div class="center">
    <div class="card-login " >
        <div class="logo-naranja center height100">Logo</div>
        <form method="POST" class="form-login" action="{{ route('login') }}">
            @csrf
            <div>
                <label for="email" >{{ __('E-Mail Address') }}</label>
                <div >
                    <input id="email" type="email" class="width100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div>
                <label for="password" >{{ __('Password') }}</label>

                <div>
                    <input id="password" type="password" class="width100 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div>
                <div >
                    <div >
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>

            <div >
                <div >
                    <button type="submit" class="btn-primary btn-login arriba20">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="anchor-oscura" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

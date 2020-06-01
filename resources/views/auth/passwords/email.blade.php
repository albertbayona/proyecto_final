@extends('layouts.app')

@section('content')
    <div class="center arriba20">
        <div class="card-login ">
            <div class="logo-naranja center height100">Rest</div>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" class="form-login" action="{{ route('password.email') }}">
                @csrf
                <div>
                    <label for="email">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" class="width100" type="email"
                               class="form-control @error('email') is-invalid @enderror" name="email" placeholder="user@example.com"
                               value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn-primary btn-login">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

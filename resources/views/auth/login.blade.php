@extends('layouts.auth')

@section('content')
<main>
    <div class="wrapper">
        <header>
            <h1>Login</h1>
        </header>
        <form method="POST" action="{{ url('/login') }}">
            @csrf

            <div class="form-input">
                <label for="email">{{ __('Emailadres') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
                    <div class="form-input">
                    <label for="password" class="form-input">{{ __('Wachtwoord') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    
                        <input class="form-checkinput" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                        <br>
                        <div class="form-input-submit">
                    <div class="form-input">
            <button class="submit-btn" type="submit">Inloggen</button>
        </div>
                </div>
            @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
            @endif
                    <a href="/registreren/leerling">Een account aanmaken</a>
        </form>
    </div>
</main>
@endsection
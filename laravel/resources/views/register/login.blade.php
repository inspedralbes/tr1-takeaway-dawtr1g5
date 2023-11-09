@extends('app')

@section('content')

<head>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<section class="section">
    <div class="container">
        @if(session('error'))
        <div class="notification is-danger">
            {{ session('error') }}
        </div>
        @endif

        <div class="columns is-centered">
            <div class="column is-8">
                <div class="card">
                    <header class="card-header">
                        <p class="card-header-title">{{ __('Iniciar sesión') }}</p>
                    </header>

                    <div class="card-content">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="field">
                                <label for "email" class="label">{{ __('Correo electrónico') }}</label>
                                <div class="control">
                                    <input id="email" type="email" class="input @error('email') is-danger @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                </div>
                                @error('email')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="field">
                                <label for="password" class="label">{{ __('Contraseña') }}</label>
                                <div class="control">
                                    <input id="password" type="password" class="input @error('password') is-danger @enderror" name="password" required autocomplete="current-password">
                                </div>
                                @error('password')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="field is-grouped">
                                <div class="control">
                                    <button type="submit" class="button is-primary">
                                        {{ __('Iniciar sesión') }}
                                    </button>
                                </div>
                                @if (Route::has('password.request'))
                                <div class="control">
                                    <a class="button is-text" href="{{ route('password.request') }}">
                                        {{ __('¿Olvidaste tu contraseña?') }}
                                    </a>
                                </div>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
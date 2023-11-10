@extends('app')

<head>
    <link rel="stylesheet" href="{{ asset('css/login.css')}}">
    <title>PreSidis Shop (admin)</title>
</head>

@section('content')


<div class="container-register">
    <div class="columns is-centered">
        <div class="column is-8">
            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">{{ __('Registro') }}</p>
                </header>
                <div class="card-content">
                    <div class="content">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="field">
                                <label for="name" class="label">{{ __('Nombre') }}</label>
                                <div class="control">
                                    <input id="name" type="text" class="input @error('name') is-danger @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                </div>
                                @error('name')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="field">
                                <label for="email" class="label">{{ __('Correo Electrónico') }}</label>
                                <div class="control">
                                    <input id="email" type="email" class="input @error('email') is-danger @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">
                                </div>
                                @error('email')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="field">
                                <label for="password" class="label">{{ __('Contraseña') }}</label>
                                <div class="control">
                                    <input id="password" type="password"
                                        class="input @error('password') is-danger @enderror" name="password" required
                                        autocomplete="new-password">
                                </div>
                                @error('password')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="field">
                                <label for="password-confirm" class="label">{{ __('Confirmar Contraseña') }}</label>
                                <div class="control">
                                    <input id="password-confirm" type="password" class="input"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="field is-grouped">
                                <div class="control">
                                    <button type="submit" class="button is-primary">
                                        {{ __('Registrarse') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
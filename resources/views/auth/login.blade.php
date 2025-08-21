<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Login</title>

    <!-- Adicionando o seu CSS de login para ser processado pelo Vite -->
    @vite(['resources/css/style_login.css', 'resources/js/app.js'])

</head>
<body>

    <div class="background"></div>

    <div class="login-container">

        <h1>Bem-vindo ao <span>PneusMax</span></h1>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="Email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 erro-msg" />
            </div>

            <!-- Password -->
            <div style="margin-top: 1rem;">
                <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="Senha" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 erro-msg" />
            </div>

            <!-- Remember Me -->
            <div style="display: block; margin-top: 1rem; text-align: left; font-size: 0.9rem;">
                <label for="remember_me" style="display: inline-flex; align-items: center;">
                    <input id="remember_me" type="checkbox" name="remember" style="width: auto; margin-bottom: 0; border-radius: 3px; border: 1px solid #ccc;">
                    <span style="margin-left: 0.5rem;">Lembrar-me</span>
                </label>
            </div>

            <div style="display: flex; align-items: center; justify-content: flex-end; margin-top: 1.5rem;">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" style="font-size: 0.9rem; color: #ECECEC; text-decoration: underline; margin-right: 1rem;">
                        Esqueceu sua senha?
                    </a>
                @endif

                <button type="submit">
                    Entrar
                </button>
            </div>
        </form>
    </div>

</body>
</html>
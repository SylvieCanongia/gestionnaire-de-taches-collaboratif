<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gestionnaire de tâches collaboratif- Accueil</title>

        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->

    </head>
    <body class="welcomeBody antialiased">
        <div class="welcome__container">
                    <h1 class="h1 welcome__heading">
                    Libérez tout votre potentiel avec notre gestionnaire de tâches collaboratif.
                    </h1>
                    <p class="welcome__content"> Gérez vos tâches efficacement et collaborez avec votre équipe en toute simplicité. Notre gestionnaire de tâches est conçu pour vous aider à atteindre vos objectifs et à améliorer votre productivité.!</p>

                    @if (Route::has('login'))
                        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                            @auth
                                <a href="{{ url('/home') }}" class="btn">Accueil</a>
                            @else
                                <a href="{{ route('login') }}" class="btn">Se connecter</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn">S'inscrire</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
    </body>
</html>

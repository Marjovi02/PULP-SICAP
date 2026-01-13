<!DOCTYPE html>
<html lang="es">
<head>
    <style>
    body {
        background-image: url("{{ asset('img/fondo..JPG') }}");
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
    }
</style>

    <meta charset="utf-8">
    <title>@yield('title', 'PULP-SICAP')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    {{-- Estilos --}}
    <style>
        :root {
            --rojo: #b71c1c;
            --rojo-hover: #d32f2f;
        }

        .navbar-rojo {
            background-color: var(--rojo) !important;
        }

        .navbar-rojo a,
        .navbar-rojo button {
            color: white !important;
            font-weight: 500;
        }

        .navbar-rojo a:hover {
            color: #ffecec !important;
        }
    </style>
</head>

<body class="bg-light">

    {{-- NAVBAR SUPERIOR --}}
    <nav class="navbar navbar-expand-lg navbar-rojo px-4">
        <a class="navbar-brand text-white fw-bold" href="{{ url('/') }}">
            PULP-SICAP
        </a>

        <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarMain">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav ms-auto">

                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/home') }}">Inicio</a>
                    </li>

                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn nav-link text-white" style="display:inline; padding:0;">
                                Cerrar sesión
                            </button>
                        </form>
                    </li>

                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a>
                    </li>

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                        </li>
                    @endif

                @endauth

            </ul>
        </div>
    </nav>


    {{-- CONTENIDO PRINCIPAL --}}
    <main class="py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>


    {{-- SCRIPTS --}}
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

</body>
</html>

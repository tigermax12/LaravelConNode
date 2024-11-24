<!DOCTYPE html>
<html lang="en">
<head>
    <title>Change.org</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="estilos.css" rel="stylesheet">
    <script async src="{{ asset('js/11391265293.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-light navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand text-danger fs-2" href="{{ route('home') }}">Change.org</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link fs-4 m-2" href="{{ route('peticiones.index') }}">Peticiones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-4 m-2" href="{{ route('peticiones.create') }}">Inicia una petición</a>
                </li>
                {{--@if (Auth::check())--}}
                    <li class="nav-item">
                        <a class="nav-link fs-4 m-2" href="{{ route('peticiones.mine') }}">Mis peticiones</a>
                    </li>
                <li class="nav-item">
                    <a class="nav-link fs-4 m-2" href="{{ route('peticiones.create') }}">Crear peticiones</a>
                </li>
                    <!-- Agregar más enlaces para usuarios autenticados aquí-->
                {{--@else--}}
                    <li class="nav-item">
                    <li class="nav-item">
                        <a class="nav-link fs-5 m-2 link-danger" href="">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5 m-2 link-danger" href="">Login</a>
                    </li>
                {{--@endif--}}
            </ul>
        </div>
    </div>
</nav>

<!-- Contenido de la página -->
<div id="content">
    @yield('content')
</div>

<!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted">
    <!-- Completar el contenido del footer aquí -->
</footer>

<!-- Scripts adicionales -->
<script src="{{ asset('vendor/assets/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('vendor/assets/vendors/js/vendor.bundle.addons.js') }}"></script>
<script src="{{ asset('vendor/assets/js/shared/off-canvas.js') }}"></script>
<script src="{{ asset('vendor/assets/js/shared/misc.js') }}"></script>
<script src="{{ asset('vendor/assets/js/demo_1/dashboard.js') }}"></script>
</body>
</html>

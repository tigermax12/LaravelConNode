@extends('layouts.public')
@section('content')
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Cambio - Bootstrap 5.3</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
        rel="stylesheet">
    <style>
        .translucido{
            background-color: rgba(255, 220, 220, 0.767);

        }
        .badge-element:hover{
            background-color: #dc3545;
        }
    </style>
</head>
<body>

<!-- Petition Section -->
<div class="container">
    <div class="row">
        <!-- Other Petitions -->
        <div class="col-lg-6">
            <div class="row">
                <!-- Petition Card -->
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Titulo: <?php echo htmlspecialchars($peticiones['titulo']); ?></h6>
                                <p class="card-text">Descripcion: <?php echo htmlspecialchars($peticiones['descripcion']); ?></p>
                                <p class="card-text">Destinatario: <?php echo htmlspecialchars($peticiones['destinatario']); ?></p>
                                <p class="card-text">Firmantes: <?php echo htmlspecialchars($peticiones['firmantes']); ?></p>
                                <p class="card-text">Estado: <?php echo htmlspecialchars($peticiones['estado']); ?></p>
                                <p class="card-text">User_id: <?php echo htmlspecialchars($peticiones['user_id']); ?></p>
                                <p class="card-text">Categoria_id: <?php echo htmlspecialchars($peticiones['categoria_id']); ?></p>
                                <p class="card-text">Created_at: <?php echo htmlspecialchars($peticiones['created_at']); ?></p>
                                <p class="card-text">Updated_at: <?php echo htmlspecialchars($peticiones['updated_at']); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="bg-light text-dark pt-4">
    <div class="container">
        <div class="row">
            <!-- Acerca de -->
            <div class="col-md-3 mb-3">
                <h6 class="text-uppercase fw-bold">Acerca de</h6>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-danger">Sobre
                            Change.org</a></li>
                    <li><a href="#" class="text-danger">Impacto</a></li>
                    <li><a href="#" class="text-danger">Empleo</a></li>
                    <li><a href="#" class="text-danger">Equipo</a></li>
                </ul>
            </div>
            <!-- Comunidad -->
            <div class="col-md-3 mb-3">
                <h6 class="text-uppercase fw-bold">Comunidad</h6>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-danger">Blog</a></li>
                    <li><a href="#" class="text-danger">Prensa</a></li>
                    <li><a href="#" class="text-danger">Normas de la
                            Comunidad</a></li>
                </ul>
            </div>
            <!-- Ayuda -->
            <div class="col-md-3 mb-3">
                <h6 class="text-uppercase fw-bold">Ayuda</h6>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-danger">Ayuda</a></li>
                    <li><a href="#"
                           class="text-danger">Privacidad</a></li>

                    <li><a href="#"
                           class="text-danger">Términos</a></li>

                    <li><a href="#" class="text-danger">Política de
                            cookies</a></li>

                    <li><a href="#" class="text-danger">Gestionar
                            cookies</a></li>
                    <li><a href="#"
                           class="text-danger">Términos</a></li>
                    <li> <a href="#"
                            class="text-danger">Cookies</a></li>
                </ul>
            </div>
            <!-- Redes sociales -->
            <div class="col-md-3 mb-3">
                <h6 class="text-uppercase fw-bold">Redes sociales</h6>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-danger">Twitter</a></li>
                    <li><a href="#"
                           class="text-danger">Facebook</a></li>
                    <li><a href="#"
                           class="text-danger">Instagram</a></li>
                </ul>
            </div>
        </div>

        <!-- Copyright and Language Selector -->
        <div
            class="d-flex justify-content-between align-items-center border-top pt-3">
            <p class="mb-0">© 2024, Change.org, PBC</p>
            <p class="mb-0 small">Esta web está protegida por reCAPTCHA
                y por Google <a href="#" class="text-dark">Política de
                    privacidad</a> y <a href="#"
                                        class="text-dark">Normas de uso</a>.</p>
            <select class="form-select form-select-sm"
                    style="width: 150px;">
                <option selected>Español (España)</option>
                <option>Inglés (Estados Unidos)</option>
                <option>Francés (Francia)</option>
                <!-- Agrega más idiomas según sea necesario -->
            </select>
        </div>
    </div>
</footer>

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Bootstrap JS -->

</body>
</html>
@endsection

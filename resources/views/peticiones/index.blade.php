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
                    <?php foreach ($peticiones as $peticion): ?>
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <img src="{{asset('/peticiones\/').$peticion->file->file_path}}" alt="" width="100px" height="100px">
                                <h6 class="card-title">Titulo: <?php echo htmlspecialchars($peticion['titulo']); ?></h6>
                                <p class="card-text">Descripcion: <?php echo htmlspecialchars($peticion['descripcion']); ?></p>
                                <p class="card-text">Destinatario: <?php echo htmlspecialchars($peticion['destinatario']); ?></p>
                                <p class="card-text">Firmantes: <?php echo htmlspecialchars($peticion['firmantes']); ?></p>
                                <p class="card-text">Estado: <?php echo htmlspecialchars($peticion['estado']); ?></p>
                                <p class="card-text">User_id: <?php echo htmlspecialchars($peticion['user_id']); ?></p>
                                <p class="card-text">Categoria_id: <?php echo htmlspecialchars($peticion['categoria_id']); ?></p>
                                <p class="card-text">Created_at: <?php echo htmlspecialchars($peticion['created_at']); ?></p>
                                <p class="card-text">Updated_at: <?php echo htmlspecialchars($peticion['updated_at']); ?></p>
                                <a href="{{ route('peticiones.show', $peticion->id) }}">Ver más</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container my-5">
    <h3 class="fw-bold">Mira lo que está pasando en Change.org</h3>
    <div class="row">
        <!-- Peticiones -->
        <div class="col-lg-10">
            <div class="card mb-3">
                <div class="card-body">
                            <span class="badge bg-dark mb-2">Popular en
                                Salud</span>
                    <h5 class="card-title">Tu vida está en nuestras
                        manos y N O P O D E M O S M Á S: STOP GUARDIAS
                        MÉDICAS 24 HORAS</h5>
                    <p class="card-text">Llegas a urgencias. Estás muy
                        grave y te ingresan en la UCI. Un médico tiene
                        que tomar YA una decisión...</p>
                    <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            <img src="https://via.placeholder.com/40"
                                 class="rounded-circle me-2"
                                 alt="Tamara Contreras del Pino">
                            <small class="text-muted">Tamara Contreras
                                del Pino</small>
                        </div>
                        <a href="#" class="text-danger">Saber más</a>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <span class="text-muted">157,843 firmantes</span>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                            <span class="badge bg-dark mb-2">Popular en
                                Salud</span>
                    <h5 class="card-title">LOS NIÑOS TAMBIÉN SE VAN -
                        Garanticen un servicio de guardia en cuidados
                        paliativos 24/7</h5>
                    <p class="card-text">Los niños que son atendidos en
                        las unidades de cuidados paliativos pediátricos
                        presentan enfermedades...</p>
                    <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            <img src="https://via.placeholder.com/40"
                                 class="rounded-circle me-2"
                                 alt="Padres de niños en Cuidados Paliativos Pediátricos">
                            <small class="text-muted">Padres de niños en
                                Cuidados Paliativos Pediátricos</small>
                        </div>
                        <a href="#" class="text-danger">Saber más</a>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <span class="text-muted">96,790 firmantes</span>
                </div>
            </div>
        </div>
        <!-- Temas Destacados -->
        <div class="col-md-2">
            <h5 class="fw-bold">TEMAS DESTACADOS</h5>
            <div class="d-flex flex-wrap flex-column">
                        <span
                            class="badge bg-light text-dark border m-1 badge-element">Sanidad</span>
                <span
                    class="badge bg-light text-dark border m-1 ">Animales</span>
                <span class="badge bg-light text-dark border m-1 ">Medio
                            ambiente</span>
                <span
                    class="badge bg-light text-dark border m-1 ">Educación</span>
                <span
                    class="badge bg-light text-dark border m-1 ">Justicia
                            económica</span>
                <span
                    class="badge bg-light text-dark border m-1 ">Refugiados</span>
                <span
                    class="badge bg-light text-dark border m-1 ">Lgtb</span>
                <span
                    class="badge bg-light text-dark border m-1 ">Alimentación</span>
                <span
                    class="badge bg-light text-dark border m-1 ">Feminismo</span>
                <span
                    class="badge bg-light text-dark border m-1 ">Mujeres
                            en México</span>
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

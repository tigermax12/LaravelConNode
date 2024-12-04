@extends('layouts.public')
@section('content')

<!-- Petition Section -->
<div class="container">
    @if (session('error'))
        <div class="alert alert-danger">{{session('error')}}</div>
    @endif
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
                                <a href="{{ route('peticiones.delete', $peticion->id) }}">Eliminar</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->

@endsection

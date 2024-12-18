@extends('layouts.public')
@section('content')

    <style>
        /* Ajustar el tamaño de las flechas de la paginación si se usa en algún lugar */
        .pagination svg {
            width: 1em;
            height: 1em;
        }
    </style>

    <!-- Petition Section -->
    <div class="container my-5">
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="row">
            <!-- Other Petitions -->
            <div class="col-lg-12">
                <div class="row">
                    @foreach($peticiones as $peticion)
                        <div class="col-md-6 mb-4">
                            <div class="card h-100 shadow-sm d-flex flex-row">
                                <!-- Imagen a la izquierda -->
                                <div style="width: 40%;">
                                    @if(!empty($peticion->file->file_path))
                                        <img
                                            src="{{ asset('peticiones/' . $peticion->file->file_path) }}"
                                            class="img-fluid h-100 w-100"
                                            alt="{{ $peticion->titulo }}"
                                            style="object-fit: cover;">
                                    @else
                                        <img
                                            src="{{ asset('img/default.jpg') }}"
                                            class="img-fluid h-100 w-100"
                                            alt="Imagen por defecto"
                                            style="object-fit: cover;">
                                    @endif
                                </div>

                                <!-- Texto a la derecha -->
                                <div class="card-body" style="width: 60%;">
                                    <h5 class="card-title mb-2">{{ $peticion->titulo }}</h5>
                                    <p class="card-text text-muted mb-1"><strong>Descripción:</strong> {{ $peticion->descripcion }}</p>
                                    <p class="card-text text-muted mb-1"><strong>Destinatario:</strong> {{ $peticion->destinatario }}</p>
                                    <p class="card-text text-muted mb-1"><strong>Firmantes:</strong> {{ $peticion->firmantes }}</p>
                                    <p class="card-text text-muted mb-1"><strong>Estado:</strong> {{ $peticion->estado }}</p>
                                    <p class="card-text text-muted mb-1"><strong>Usuario ID:</strong> {{ $peticion->user_id }}</p>
                                    <p class="card-text text-muted mb-1"><strong>Categoría ID:</strong> {{ $peticion->categoria_id }}</p>
                                    <p class="card-text text-muted mb-1"><small><strong>Creado:</strong> {{ \Carbon\Carbon::parse($peticion->created_at)->format('d/m/Y H:i') }}</small></p>
                                    <p class="card-text text-muted mb-3"><small><strong>Actualizado:</strong> {{ \Carbon\Carbon::parse($peticion->updated_at)->format('d/m/Y H:i') }}</small></p>

                                    <a href="{{ route('peticiones.show', $peticion->id) }}" class="btn btn-primary btn-sm">Ver más</a>
                                    <a href="{{ route('peticiones.edit', $peticion->id)}}" class="btn btn-info btn-sm">Update</a>
                                    <a href="{{ route('peticiones.delete', $peticion->id) }}"
                                       class="btn btn-danger btn-sm"
                                       onclick="event.preventDefault(); document.getElementById('delete-form-{{ $peticion->id }}').submit();">
                                        Delete
                                    </a>

                                    <form method="POST" id="delete-form-{{ $peticion->id }}" action="{{ route('peticiones.delete', $peticion->id) }}" style="display: none;">
                                        @method('delete')
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-4 d-flex justify-content-center">
                    {!! $peticiones->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->

@endsection

@extends('layouts.admin')
@section('content')

    <style>
        /* Ajustar el tamaño de las flechas de la paginación, si las hubiera en esta página */
        .pagination svg {
            width: 1em;
            height: 1em;
        }
    </style>

    <div class="container my-5">
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="row">
            <!-- Tarjeta de la Petición -->
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
                        <p class="card-text text-muted mb-1"><small><strong>Creado:</strong> {{ $peticion->created_at->format('d/m/Y H:i') }}</small></p>
                        <p class="card-text text-muted mb-3"><small><strong>Actualizado:</strong> {{ $peticion->updated_at->format('d/m/Y H:i') }}</small></p>

                        <!-- Botón de firmar -->
                        <a href="{{ route('peticiones.firmar', $peticion->id) }}"
                           class="btn btn-success btn-sm"
                           onclick="event.preventDefault(); document.getElementById('firma-id').submit();">
                            Firmar
                        </a>
                        <form method="POST" id="firma-id" action="{{ route('peticiones.firmar', $peticion->id) }}">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

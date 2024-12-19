@extends('layouts.admin')
@section('content')
    <!-- Contenido principal -->
    <div class="flex-grow-1">

        <div class="table-container">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Peticiones</h4>
                <a href="{{ route('adminpeticiones.create') }}" class="btn btn-primary">New</a>
            </div>
            <table class="table table-bordered table-striped align-middle text-center">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Id</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Firmantes</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($peticiones as $peticion)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $peticion->id }}</td>
                    <td>{{ $peticion->titulo }}</td>
                    <td>{{ $peticion->descripcion }}</td>
                    <td>{{ $peticion->firmantes }}</td>
                    <td>{{ $peticion->estado }}</td>
                    <td>
                        @if($peticion->estado=='pendiente')

                            <form method="POST" id="firma-id" action="{{ route('adminpeticiones.estado', $peticion->id) }}">

                            <button type="submit">Subir</button>    @csrf
                                @method('PUT')
                            </form>
                        @endif
                        <a href="{{ route('adminpeticiones.edit', $peticion->id)}}" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                        <a href="{{ route('adminpeticiones.show', $peticion->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-eye"></i></a>

                        <a href="{{ route('adminpeticiones.delete', $peticion->id) }}"
                           class="btn btn-danger btn-sm"
                           onclick="event.preventDefault(); document.getElementById('delete-form-{{ $peticion->id }}').submit();">
                            <i class="bi bi-trash"></i>
                        </a>
                        <form method="POST" id="delete-form-{{ $peticion->id }}" action="{{ route('adminpeticiones.delete', $peticion->id) }}" style="display: none;">
                            @method('delete')
                            @csrf
                        </form>
                    </td>
                </tr>
                @endforeach
                <!-- Puedes duplicar filas como ejemplo -->
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection

@extends('layouts.admin')
@section('content')
    <!-- Contenido principal -->
    <div class="flex-grow-1">
        @if (session('errors'))
            <div class="alert alert-danger">{{ session('errors') }}</div>
        @endif
        <div class="table-container">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Categorias</h4>
                <a href="{{ route('admincategorias.create') }}" class="btn btn-primary">New</a>
            </div>
            <table class="table table-bordered table-striped align-middle text-center">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Fecha de creacion</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categorias as $categoria)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $categoria->id }}</td>
                        <td>{{ $categoria->nombre }}</td>
                        <td>{{ $categoria->created_at }}</td>
                        <td>
                            <a href="{{ route('admincategorias.delete', $categoria->id) }}"
                               class="btn btn-danger btn-sm"
                               onclick="event.preventDefault(); document.getElementById('delete-form-{{ $categoria->id }}').submit();">
                                Eliminar</i>
                            </a>
                            <form method="POST" id="delete-form-{{ $categoria->id }}" action="{{ route('admincategorias.delete', $categoria->id) }}" style="display: none;">
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
            <div class="mt-4 d-flex justify-content-center">
                {!! $categorias->links('pagination::bootstrap-5') !!}
            </div>
    </div>
@endsection

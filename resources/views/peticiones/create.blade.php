@extends('layouts.public')
@section('content')
    <div class="container">
        <h1>Crear Nueva Petición</h1>
        <form action="{{ route('peticiones.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" id="titulo" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="destinatario">Destinatario</label>
                <input type="text" name="destinatario" id="destinatario" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="categoria">Categoría</label>
                <select name="categoria_id" id="categoria" class="form-control">
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Crear Petición</button>
        </form>
    </div>

@endsection

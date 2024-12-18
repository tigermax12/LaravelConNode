@extends('layouts.public')
@section('content')
    <div class="container">
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <h1>Actualizar Petición</h1>
        <form action="{{ route('peticiones.update', $peticion->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" value="{{ old('titulo', $peticion->titulo) }}" class="form-control @error('titulo') is-invalid @enderror" id="validationServer01" required>
                @error('titulo')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" rows="4" class="form-control @error('descripcion') is-invalid @enderror" id="validationServer01" required>{{ old('descripcion', $peticion->descripcion) }}</textarea>
                @error('descripcion')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="destinatario">Destinatario</label>
                <input type="text" name="destinatario" value="{{ old('destinatario', $peticion->destinatario) }}" class="form-control @error('destinatario') is-invalid @enderror" id="validationServer01" required>
                @error('destinatario')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="categoria">Categoría</label>
                <select name="categoria_id" id="categoria" class="form-control">
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ $categoria->id == old('categoria_id', $peticion->categoria_id) ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
                @error('categoria_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12">
                <label class="uilabel-left form-element__label uilabel" for="file">
                    <span>Sube una imagen (opcional)</span>
                </label>
                <input type="file" id="file" name="file" class="form-control @error('file') is-invalid @enderror">
                @error('file')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                @if ($peticion->file)
                    <p>Imagen actual: <a href="{{ asset('peticiones/' . $peticion->file->file_path) }}" target="_blank">Ver imagen</a></p>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Petición</button>
        </form>
    </div>
@endsection

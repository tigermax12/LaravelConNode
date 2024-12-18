@extends('layouts.admin')
@section('content')
    <div class="container">
        @if (session('error'))
            <div class="alert alert-danger">{{session('error')}}</div>
        @endif
        <h1>Crear Nueva Petición</h1>
        <form action="{{ route('adminpeticiones.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" name="titulo"  class="form-control @error('titulo') is-invalid @enderror" id="validationServer01" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" rows="4" class="form-control @error('descripcion') is-invalid @enderror" id="validationServer01" required></textarea>
            </div>
            <div class="form-group">
                <label for="destinatario">Destinatario</label>
                <input type="text" name="destinatario" class="form-control @error('destinatario') is-invalid @enderror" id="validationServer01" required>
            </div>
            <div class="form-group">
                <label for="categoria">Categoría</label>
                <select name="categoria_id" id="categoria" class="form-control">
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12">
                <label class="uilabel-left form-element__label uilabel" for="304:343;a"><span>Sube una imagen</span>
                    <span class="required" title="obligatorio"></span>
                </label>
                <input type="file" id="file" name="file" class="form-control @error('file') is-invalid @enderror" placeholder="file" aria-required="true" >
                @error('file')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Crear Petición</button>
        </form>
    </div>

@endsection

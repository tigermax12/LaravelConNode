@extends('layouts.admin')
@section('content')
    <div class="container">
        @if (session('error'))
            <div class="alert alert-danger">{{session('error')}}</div>
        @endif
        <h1>Crear Nueva Categoria</h1>
        <form action="{{ route('admincategorias.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre"  class="form-control @error('nombre') is-invalid @enderror" id="validationServer01" required>
            </div>
            <button type="submit" class="btn btn-primary">Crear Categoria</button>
        </form>
    </div>

@endsection

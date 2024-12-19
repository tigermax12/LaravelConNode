@extends('layouts.admin')
@section('content')
    <!-- Contenido principal -->
    <div class="flex-grow-1">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-container">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Crear Usuario</h4>
                <a href="{{ route('adminusers.index') }}" class="btn btn-secondary">Volver</a>
            </div>
            <form action="{{ route('adminusers.register') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="c_password" class="form-label">Confirmar Contraseña</label>
                    <input type="password" class="form-control" id="c_password" name="c_password" required>
                </div>
                <div class="mb-3">
                    <label for="role_id" class="form-label">Rol</label>
                    <input type="number" class="form-control" id="role_id" name="role_id" value="0" required>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
@endsection

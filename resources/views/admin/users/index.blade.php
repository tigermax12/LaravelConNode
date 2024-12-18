@extends('layouts.admin')
@section('content')
    <!-- Contenido principal -->
    <div class="flex-grow-1">

        <div class="table-container">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Usuarios</h4>
                <a href="#" class="btn btn-primary">New</a>
            </div>
            <table class="table table-bordered table-striped align-middle text-center">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Fecha de creacion</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            <button class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-primary btn-sm"><i class="bi bi-eye"></i></button>
                            <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
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

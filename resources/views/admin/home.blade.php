@extends('layouts.admin')
@section('content')
    <!-- Contenido principal -->
    <div class="flex-grow-1">

        <div class="table-container">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Peticiones</h4>
                <a href="#" class="btn btn-primary">New</a>
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
                <tr>
                    <td>1</td>
                    <td>13</td>
                    <td>pgquyyiyysdsdwewewew</td>
                    <td>pp</td>
                    <td>1</td>
                    <td>pendiente</td>
                    <td>
                        <button class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></button>
                        <button class="btn btn-primary btn-sm"><i class="bi bi-eye"></i></button>
                        <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>14</td>
                    <td>hhh</td>
                    <td>h</td>
                    <td>0</td>
                    <td>aceptada</td>
                    <td>
                        <button class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></button>
                        <button class="btn btn-primary btn-sm"><i class="bi bi-eye"></i></button>
                        <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>
                <!-- Puedes duplicar filas como ejemplo -->
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection

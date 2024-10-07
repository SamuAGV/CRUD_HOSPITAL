<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: black;
            color: white;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        main {
            flex: 1;
        }
        footer {
            background-color: black;
            padding: 1rem 0;
        }
    </style>
</head>
<body>
@extends('layouts.app')

@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">HOSPITAL</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('asignacion') }}">Asignacion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('hospitales') }}">Hospitales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('medicos') }}">Médicos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pacientes') }}">Pacientes</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<main>
<h1>HOSPITALES</h1>
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('crearHospital') }}" class="btn btn-outline-success">Crear Hospital</a>
    </div>
    <table class="table table-dark">
        <thead>
            <tr>
                <th>#</th>
                <th>Clave</th>
                <th>Nombre</th>
                <th>Estatus</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hospitales as $hospital)
                <tr>
                    <td>{{$hospital->id_hospital }}</td>
                    <td>{{ $hospital->clave }}</td>
                    <td>{{ $hospital->nombre }}</td>
                    <td>{{ $hospital->estatus }}</td>
                    <td>
                        <a href="{{ route('detallesHospital', $hospital->id_hospital) }}" class="btn btn-outline-info">Detalles</a>
                        <a href="{{ route('editarHospital', $hospital->id_hospital) }}" class="btn btn-outline-warning">Editar</a>
                        <a href="{{ route('eliminarHospital', $hospital->id_hospital) }}" class="btn btn-outline-danger">Eliminar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</main>
<footer class="text-center">
    <div class="container">
        <p class="text-white">Hospital | Samuel Antonio Garduño Viviana DSM-43</p>
    </div>
</footer>
@endsection

</body>
</html>
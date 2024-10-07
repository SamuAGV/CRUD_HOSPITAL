<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicos</title>
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
    <h1>MEDICOS</h1>
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('crearMedico') }}" class="btn btn-outline-success">Crear Médico</a>
    </div>
    <table class="table table-dark">
        <thead>
            <tr>
                <th>#</th>
                <th>Foto</th>
                <th>Clave</th>
                <th>Nombre</th>
                <th>Fecha De Nacimiento</th>
                <th>Sexo</th>
                <th>E-Mail</th>
                <th>Estatus</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($medicos as $medico)
                <tr>
                    <td>{{ $medico->id_medico }}</td>
                    <td>
                        @if ($medico->foto && file_exists(public_path($medico->foto)))
                            <img src="{{ asset($medico->foto) }}" alt="Foto de Médico" class="img-thumbnail" style="max-width: 50px;">
                        @else
                            <img src="{{ asset('img/medico.png') }}" alt="Foto no disponible" class="img-thumbnail" style="max-width: 50px;">
                        @endif
                    </td>
                    <td>{{ $medico->clave }}</td>
                    <td>{{ $medico->nombre }} {{ $medico->apellidop }}</td>
                    <td>{{ $medico->fecha_nacimiento }}</td>
                    <td>{{ $medico->sexo }}</td>
                    <td>{{ $medico->email }}</td>
                    <td>{{ $medico->estatus }}</td>
                    <td>
                        <a href="{{ route('detallesMedico', $medico->id_medico) }}" class="btn btn-outline-info">Detalles</a>
                        <a href="{{ route('editarMedico', $medico->id_medico) }}" class="btn btn-outline-warning">Editar</a>
                        <a href="{{ route('eliminarMedico', $medico->id_medico) }}" class="btn btn-outline-danger">Eliminar</a>
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

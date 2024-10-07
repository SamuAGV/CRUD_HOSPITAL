<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Paciente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
            padding: 2rem; 
        }
        footer {
            background-color: black; 
            padding: 1rem 0; 
        }
        .transparent-input,
        .transparent-select,
        .transparent-file {
            background-color: transparent; 
            border: 1px solid white; 
            color: white; 
        }
        .transparent-input::placeholder,
        .transparent-select::placeholder {
            color: white; 
            opacity: 0.7; 
        }
        .transparent-file {
            padding: 0.375rem 0.75rem; 
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
    <h1>Editar Paciente</h1>
    <form action="{{ route('actualizarPaciente', $paciente->id_paciente) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control transparent-input" value="{{ $paciente->nombre }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="apellidop">Apellido Paterno</label>
            <input type="text" name="apellidop" class="form-control transparent-input" value="{{ $paciente->apellidop }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
            <input type="date" name="fecha_nacimiento" class="form-control transparent-input" value="{{ $paciente->fecha_nacimiento }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="sexo">Sexo</label>
            <select name="sexo" class="form-control transparent-select" required>
                <option value="Masculino" {{ $paciente->sexo == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                <option value="Femenino" {{ $paciente->sexo == 'Femenino' ? 'selected' : '' }}>Femenino</option>
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="estatus">Estatus</label>
            <select name="estatus" class="form-control transparent-select" required>
                <option value="Activo" {{ $paciente->estatus == 'Activo' ? 'selected' : '' }}>Activo</option>
                <option value="Inactivo" {{ $paciente->estatus == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="foto">Foto</label>
            <input type="file" name="foto" class="form-control transparent-file">
        </div>
        <button type="submit" class="btn btn-warning">Actualizar</button>
        <a href="{{ route('pacientes') }}" class="btn btn-outline-primary">Volver</a>
    </form>
</main>
<footer class="text-center">
    <div class="container">
        <p class="text-white">Hospital | Samuel Antonio Garduño Viviana DSM-43</p>
    </div>
</footer>
@endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

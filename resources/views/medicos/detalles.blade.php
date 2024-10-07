<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Médico</title>
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
<div class="container mt-5">
    <h1>Detalles del Médico</h1>
    <div class="card text-white bg-dark mb-3">
        <div class="card-body">
        <h5 class="card-title">Nombre: {{ $medico->nombre }} {{ $medico->apellidop }}</h5>
            <p class="card-text">Clave: {{ $medico->clave }}</p>
            <p class="card-text">Fecha de Nacimiento: {{ $medico->fecha_nacimiento }}</p>
            <p class="card-text">Sexo: {{ $medico->sexo }}</p>
            <p class="card-text">Email: {{ $medico->email }}</p>
            <p class="card-text">Estatus: {{ $medico->estatus }}</p>
            @if ($medico->foto && file_exists(public_path($medico->foto)))
    <p>Foto:</p>
    <img src="{{ asset($medico->foto) }}" alt="Foto de Médico" class="img-thumbnail" style="max-width: 150px;">
@else
    <p>Foto:</p>
    <img src="{{ asset('img/medico.png') }}" alt="Foto no disponible" class="img-thumbnail" style="max-width: 150px;">
@endif


        </div>
    </div>
    <a href="{{ route('medicos') }}" class="btn btn-outline-primary">Volver</a>
</div>
<footer class="text-center">
        <div class="container">
            <p class="text-white">Hospital | Samuel Antonio Garduño Viviana DSM-43</p>
        </div>
    </footer>
@endsection
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Hospital</title>
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
        .btn-transparent {
            background-color: transparent;
            border: 1px solid white; 
            color: white; 
        }
        .btn-transparent:hover {
            background-color: rgba(255, 255, 255, 0.1); 
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
    <h1>Detalles del Hospital</h1>
    <div class="card bg-dark text-white">
        <div class="card-body">
        <p class="card-title"><strong>Clave: </strong>{{ $hospital->clave }}</p>
            <p class="card-title"><strong>Nombre: </strong>{{ $hospital->nombre }}</p>
            <p class="card-text"><strong>Estatus: </strong> {{ $hospital->estatus }}</p>
            @if($hospital->foto)
                <img src="{{ asset($hospital->foto) }}" alt="Foto de {{ $hospital->nombre }}"  alt="Foto no disponible" class="img-thumbnail" style="max-width: 150px;">
            @endif
        </div>
        <a href="{{ route('hospitales') }}" class="btn btn-outline-primary">Volver</a>

    </div>
    
</main>
<footer class="text-center">
    <div class="container">
        <p class="text-white">Hospital | Samuel Antonio Garduño Viviana DSM-43</p>
    </div>
</footer>
@endsection

</body>
</html>

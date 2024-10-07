<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignacion</title>
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
        .table-dark {
            color: white;
            background-color: #343a40;
        }
        .form-select, .input-group-text, .form-control {
            background-color: #343a40;
            color: white;
            border: 1px solid #6c757d;
        }
        .form-select:focus, .form-control:focus {
            border-color: #007bff;
            box-shadow: none;
        }
    </style>
</head>
<body>
    <div class="container">
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
        <center><h3>ATENCION</h3></center>
        <hr>
        <br>
        <form action="{{ route('asignacion_registrar') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <center><h3>ALTA DE ATENCION MEDICA</h3></center>

            <div class="input-group mb-3">
                <label class="input-group-text" for="id_hospital">Hospital</label>
                <select class="form-select" id="id_hospital" name="id_hospital">
                    <option selected>Selecciona una opción...</option>
                    @foreach($hospital as $item)
                         <option value="{{ $item->id_hospital }}">{{ $item->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="id_medico">Médico</label>
                <select class="form-select" id="id_medico" name="id_medico">
                    <option selected>Selecciona una opción...</option>
                    @foreach($medico as $item)
                         <option value="{{ $item->id_medico }}">{{ $item->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="id_paciente">Paciente</label>
                <select class="form-select" id="id_paciente" name="id_paciente">
                    <option selected>Selecciona una opción...</option>
                    @foreach($paciente as $item)
                         <option value="{{ $item->id_paciente }}">{{ $item->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="detalles">Detalles</label>
                <input type="text" class="form-control" id="detalles" name="detalles" placeholder="Escribe los detalles aquí...">
            </div>
            <hr><br>

            <button type="submit" class="btn btn-outline-primary">Guardar</button>
        </form>
        <br><br>
        <hr>
        <table class="table table-dark">
            <tr>
                <th>Nº</th>
                <th>DETALLES</th>
                <th>HOSPITAL</th>
                <th>DOCTOR</th>
                <th>PACIENTE</th>
                <th>BORRAR</th>
            </tr>
            @foreach($asignaciones as $asignacion)
            <tr>
                <td>{{ $asignacion->id_atencion }}</td>
                <td>{{ $asignacion->detalles }}</td>
                <td>{{ $asignacion->AgHospital?->nombre }}</td>
                <td>{{ $asignacion->AgMedico?->nombre }}</td>
                <td>{{ $asignacion->AgPaciente?->nombre }}</td>
                <td>
                    <a href="{{ route('asignacion_borrar', ['id' => $asignacion->id_atencion]) }}">
                        <button type="button" class="btn btn-outline-danger btn-sm" onclick="return confirm('¿Seguro que desea borrar el registro?')">
                            Borrar
                        </button>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
    </main>
    <footer class="text-center">
        <div class="container">
            <p class="text-white">Hospital | Samuel Antonio Garduño Viviana DSM-43</p>
        </div>
    </footer>
</div>
</body>
</html>

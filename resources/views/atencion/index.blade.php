<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignación de Pacientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <!----------- Navbar: inicio------------------------------------------------->
        <nav class="navbar navbar-dark bg-dark fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="">
                    <img src="{{ url('img/your_image_here.jpeg') }}" alt="" width="45">
                    Hospital
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title">Menú</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('atencion$atencion') }}">Asignaciones</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <!----------- Navbar: inicio------------------------------------------------->

        <h3>Asignación de Pacientes a Médicos</h3>
        <form action="{{ route('crear') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="input-group mb-3">
                <select class="form-select" id="id_hospital" name="id_hospital">
                    <option selected>Selecciona un hospital...</option>
                    @foreach($hospitales as $hospital)
                        <option value="{{ $hospital->id_hospital }}">{{ $hospital->nombre }}</option>
                    @endforeach
                </select>
                <label class="input-group-text" for="id_hospital">Hospital</label>
            </div>

            <div class="input-group mb-3">
                <select class="form-select" id="id_medico" name="id_medico">
                    <option selected>Selecciona un médico...</option>
                    @foreach($medicos as $medico)
                        <option value="{{ $medico->id_medico }}">{{ $medico->nombre }}</option>
                    @endforeach
                </select>
                <label class="input-group-text" for="id_medico">Médico</label>
            </div>

            <div class="input-group mb-3">
                <select class="form-select" id="id_paciente" name="id_paciente">
                    <option selected>Selecciona un paciente...</option>
                    @foreach($pacientes as $paciente)
                        <option value="{{ $paciente->id_paciente }}">{{ $paciente->nombre }}</option>
                    @endforeach
                </select>
                <label class="input-group-text" for="id_paciente">Paciente</label>
            </div>

            <div class="input-group mb-3">
                <textarea class="form-control" id="detalle" name="detalle" placeholder="Detalles de la asignación..."></textarea>
                <label class="input-group-text" for="detalle">Detalle</label>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

        <h1>Lista de Asignaciones</h1>
        <table class="table">
            <tr>
                <th>Nº</th>
                <th>Hospital</th>
                <th>Médico</th>
                <th>Paciente</th>
                <th>Detalle</th>
                <th>Acciones</th>
            </tr>
            @foreach($atenciones as $atencion)
            <tr>
                <td>{{ $atencion->id_atencion }}</td>
                <td>{{ $atencion->hospital->nombre }}</td>
                <td>{{ $atencion->medico->nombre }}</td>
                <td>{{ $atencion->paciente->nombre }}</td>
                <td>{{ $atencion->detalle }}</td>
                <td>
                    <a href="{{ route('borrar', ['id' => $atencion->id_atencion]) }}">
                        <button type="button" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que desea borrar el registro?')">Borrar</button>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>

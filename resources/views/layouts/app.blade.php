<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Document')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Ajusta la ruta según tu configuración -->
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>

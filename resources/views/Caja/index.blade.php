<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite([
        'resources/css/Caja/styleCaja.css',
        'resources/js/Caja/appCaja.js',
    ])
    <title>Caja</title>
</head>
<body>
    <div class="contenido">
        <h3>Yo Soy CAJA</h3>
    </div>
</body>
</html>
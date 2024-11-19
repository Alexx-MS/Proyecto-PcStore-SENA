<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Categoría: {{ $category }}</title>
</head>
<body>
    <h1>Detalles de la Categoría: {{ $category }}</h1>

    <p><strong>Nombre:</strong> {{ $category }}</p>
    <p><strong>Slug:</strong> {{ $slug }}</p>
    <p><strong>Descripción:</strong> Aquí va una descripción más detallada de la categoría.</p> <!-- Puedes agregar detalles adicionales de la categoría si los tienes -->

    <h2>Otras Categorías</h2>
    <ul>
        @foreach ($categories as $key => $name)
            <li><a href="{{ route('category', $key) }}">{{ $name }}</a></li>
        @endforeach
    </ul>

    <a href="{{ route('home') }}">Volver al inicio</a>
</body>
</html>

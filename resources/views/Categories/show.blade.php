<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Categoría</title>
</head>
<body>
    <h1>Detalles de la Categoría</h1>

    <p><strong>Nombre:</strong> {{ $category->name }}</p>
    <p><strong>Descripción:</strong> {{ $category->description }}</p>

    <a href="{{ route('categories.index') }}">Volver</a>
</body>
</html>

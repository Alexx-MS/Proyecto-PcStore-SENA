<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Categoría</title>
</head>
<body>
    <h1>Crear Categoría</h1>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Nombre</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div>
            <label for="description">Descripción</label>
            <textarea id="description" name="description"></textarea>
        </div>

        <button type="submit">Guardar</button>
    </form>
</body>
</html>

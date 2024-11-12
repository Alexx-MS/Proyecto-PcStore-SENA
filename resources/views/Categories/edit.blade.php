<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoría</title>
</head>
<body>
    <h1>Editar Categoría</h1>

    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Nombre</label>
            <input type="text" id="name" name="name" value="{{ $category->name }}" required>
        </div>

        <div>
            <label for="description">Descripción</label>
            <textarea id="description" name="description">{{ $category->description }}</textarea>
        </div>

        <button type="submit">Actualizar</button>
    </form>
</body>
</html>

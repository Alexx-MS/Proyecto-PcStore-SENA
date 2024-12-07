<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Categoría</title>
    <link rel="stylesheet" href="{{ asset('css/categories/create.css') }}">
</head>
<body>
    <div class="form-wrapper">
        <h1 class="form-title">Crear Categoría</h1>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" id="name" name="name" class="form-input" required>
            </div>
            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea id="description" name="description" class="form-input" placeholder="Agrega una breve descripción..."></textarea>
            </div>
            <button type="submit" class="submit-btn">Guardar</button>
        </form>
    </div>
</body>
</html>

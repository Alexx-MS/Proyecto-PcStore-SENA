<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoría</title>
    <link rel="stylesheet" href="{{ asset('css/categories/edit.css')}}">
</head>
<body>
    <div class="container">
        <h1 class="form-title">Editar Categoría</h1>
        
        <form action="{{ route('categories.update', $category->slug) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" id="name" name="name" value="{{ $category->name }}" required>
            </div>
            
            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea id="description" name="description">{{ $category->description }}</textarea>
            </div>
            
            <button type="submit" class="action-link">Actualizar</button>
        </form>
    </div>
</body>
</html></html>

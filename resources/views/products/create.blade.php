@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nuevo Producto - Componentes PC</title>
   <link rel="stylesheet" href="{{ asset('css/products/create.css') }}">
</head>
<body>

    <div class="form-container">
        <h1>Crear Nuevo Producto</h1>

        @if ($errors->any())
            <div class="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="model">Modelo</label>
                <input type="text" name="model" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="price">Precio</label>
                <input type="number" name="price" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="generation">Generación</label>
                <input type="text" name="generation" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="release_date">Fecha de Lanzamiento</label>
                <input type="date" name="release_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="availability">Disponibilidad</label>
                <input type="text" name="availability" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="technical_specifications">Ficha Técnica</label>
                <textarea name="technical_specifications" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="brand">Marca</label>
                <input type="text" name="brand" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="category_id">Categoría</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="btn-container">
                <button type="submit" class="btn">Crear Producto</button>
            </div>
        </form>
    </div>

</body>
</html>
@endsection

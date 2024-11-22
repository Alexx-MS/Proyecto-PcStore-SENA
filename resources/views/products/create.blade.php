@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nuevo Producto - Componentes PC</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.8), rgba(30, 30, 30, 0.9)), url("{{ asset('images/fondo2.jpeg') }}");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #fff;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-container {
            background: rgba(0, 0, 0, 0.7);
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5);
            max-width: 600px;
            width: 100%;
            text-align: center;
            transition: transform 0.3s;
        }

        .form-container:hover {
            transform: scale(1.03);
        }

        .form-container h1 {
            color: #f8f9fa;
            margin-bottom: 1rem;
            font-size: 2.5rem;
            color: #00c7ff;
        }

        .form-container img {
            width: 80px;
            margin-bottom: 1.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
            text-align: left;
            width: 100%;
        }

        .form-group label {
            display: block;
            font-size: 1rem;
            color: #ffcd38; /* Amarillo para destacar etiquetas */
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 1rem;
            font-size: 1rem;
            border: 1px solid #39394d;
            border-radius: 5px;
            background: #29293d;
            color: #f5f5f5;
            transition: background-color 0.3s;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            background-color: #fff;
            box-shadow: 0 0 5px #00c7ff;
            border-color: #00c7ff;
        }

        .form-group textarea {
            height: 100px;
        }

        .form-group select {
            background: #29293d;
            color: #f5f5f5;
        }

        .form-group select:focus {
            background-color: #fff;
        }

        .btn-container {
            margin-top: 2rem;
        }

        .btn {
            width: 100%;
            padding: 1rem;
            font-size: 1rem;
            background-color: #00c7ff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn:hover {
            background-color: #0078a3;
            transform: scale(1.05);
        }

        .alert {
            background-color: #ff5252;
            color: #fff;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .alert ul {
            margin: 0;
            padding: 0;
            list-style-type: none;
        }

        .alert li {
            margin: 5px 0;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .form-container {
                padding: 1.5rem;
            }

            .form-container h1 {
                font-size: 2rem;
            }

            .btn {
                font-size: 14px;
                padding: 12px;
            }

            .form-group input,
            .form-group select,
            .form-group textarea {
                font-size: 14px;
                padding: 0.8rem;
            }
        }
    </style>
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

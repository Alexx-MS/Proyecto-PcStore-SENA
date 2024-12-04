<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Opinion</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #6200ea;
            padding: 15px 20px;
            text-align: center;
        }
        header a {
            text-decoration: none;
            color: white;
            font-size: 1.5em;
            font-weight: bold;
        }
        h1 {
            text-align: center;
            font-size: 2em;
            color: #6200ea;
            margin: 20px 0;
        }
        .form-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-size: 1em;
            margin-bottom: 5px;
            color: #555;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            font-size: 1em;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
            transition: border-color 0.3s ease;
        }
        .form-control:focus {
            border-color: #6200ea;
            outline: none;
            background-color: #fff;
        }
        .btn-primary {
            display: block;
            width: 100%;
            background-color: #6200ea;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #4b00c9;
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 0.9em;
        }
        .alert-danger ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        .alert-danger li {
            margin: 5px 0;
        }
        @media (max-width: 600px) {
            .form-container {
                margin: 10px;
                padding: 15px;
            }
            h1 {
                font-size: 1.8em;
            }
        }
    </style>
</head>
<body>

<header>
    <a href="{{ url('/') }}">Logo</a>
</header>

<h1>Agregar Opinión</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-container">
    <form action="{{ route('opinions.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="product_id">ID del Producto</label>
            <input type="number" name="product_id" id="product_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="rating">Calificación</label>
            <input type="number" name="rating" id="rating" class="form-control" min="1" max="5" required>
        </div>
        <div class="form-group">
            <label for="comment">Comentario</label>
            <textarea name="comment" id="comment" class="form-control" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label for="date">Fecha</label>
            <input type="date" name="date" id="date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="usefulness">Utilidad</label>
            <input type="number" name="usefulness" id="usefulness" class="form-control" min="0" required>
        </div>
        <button type="submit" class="btn-primary">Aregar Opinión</button>
    </form>
</div>

</body>
</html>



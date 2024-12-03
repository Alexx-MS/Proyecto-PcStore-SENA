<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Opinion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000;
            color: #fff;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #d32f2f;
            padding: 10px 20px;
            text-align: center;
        }
        header a {
            color: #fff;
            text-decoration: none;
        }
        h1 {
            font-size: 2em;
            margin-bottom: 20px;
        }
        .form-container {
            width: 50%;
            margin: 20px auto;
            background-color: #333;
            padding: 20px;
            border-radius: 8px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            font-size: 1.1em;
            margin-bottom: 5px;
            display: block;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            font-size: 1em;
            border: 1px solid #666;
            border-radius: 4px;
            background-color: #444;
            color: #fff;
        }
        .form-control:focus {
            border-color: #d32f2f;
            outline: none;
        }
        .btn-primary {
            background-color: #d32f2f;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1.1em;
        }
        .btn-primary:hover {
            background-color: #c62828;
        }
        .alert-danger {
            background-color: #f44336;
            color: white;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        .alert-danger ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .alert-danger li {
            margin: 5px 0;
        }
    </style>
</head>
<body>

<header>
    <!-- Aquí va el enlace al logo -->
    <a href="{{ url('/') }}">
        <img src="URL_DEL_LOGO" alt="Logo" style="max-height: 50px;">
    </a>
</header>

<h1>Add New Opinion</h1>

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
            <label for="product_id">Product ID</label>
            <input type="number" name="product_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="rating">Rating</label>
            <input type="number" name="rating" class="form-control" min="1" max="5" required>
        </div>
        <div class="form-group">
            <label for="comment">Comment</label>
            <textarea name="comment" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="usefulness">Usefulness</label>
            <input type="number" name="usefulness" class="form-control" min="0" required>
        </div>
        <button type="submit" class="btn-primary">Add Opinion</button>
    </form>
</div>

</body>
</html>


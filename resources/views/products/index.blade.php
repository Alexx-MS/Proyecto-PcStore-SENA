<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Productos</title>
    <style>
        /* Color Palette */
        :root {
            --deep-black: #121212;
            --soft-black: #1E1E1E;
            --primary-red: #B22222;
            --dark-red: #8B0000;
            --light-text: #F5F5F5;
            --hover-red: #8B0000;
        }

        /* General Styles */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: var(--deep-black);
            color: var(--light-text);
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: var(--primary-red);
            font-size: 2.8em;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }

        /* Button Styles */
        .btn {
            display: inline-block;
            padding: 12px 18px;
            font-size: 14px;
            text-decoration: none;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.3);
        }

        /* Primary Button */
        .btn-primary {
            background-color: var(--primary-red);
            color: var(--light-text);
        }

        .btn-primary:hover {
            .btn-primary:hover {
          background-color: var(--primary-red);
         transform: none;
          opacity: 1;
          }
        }

        /* Info Button */
        .btn-info {
            background-color: #A52A2A; /* Dark red for info */
            color: var(--light-text);
        }

        .btn-info:hover {
            background-color: #5D0000;
        }

        /* Warning Button */
        .btn-warning {
            background-color: #A52A2A; /* Brown-red for warning */
            color: var(--light-text);
        }

        .btn-warning:hover {
            background-color: #A52A2A;
        }

        /* Danger Button */
        .btn-danger {
            background-color:#A52A2A; /* Crimson for danger */
            color: var(--light-text);
        }

        .btn-danger:hover {
            background-color:#A52A2A;
        }

        /* Alert Styles */
        .alert {
            margin: 10px auto;
            padding: 15px 20px;
            border-radius: 8px;
            max-width: 800px;
            text-align: center;
            font-size: 16px;
            font-weight: bold;
        }

        /* Success Alert */
        .alert-success {
            background-color: var(--primary-red);
            color: var(--light-text);
            border: 1px solid var(--dark-red);
        }

        /* Table Styles */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: var(--soft-black);
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
        }

        /* Table Headers */
        .table th,
        .table td {
            padding: 15px;
            text-align: left;
            color: var(--light-text);
            border-bottom: 1px solid #39394d;
        }

        .table th {
            background-color: var(--primary-red);
            color: var(--light-text);
            text-transform: uppercase;
            font-size: 14px;
        }

        .table-striped tr:nth-child(even) {
            background-color: #2C2C2C; /* Slightly lighter black */
        }

        .table-striped tr:hover {
            background-color: rgba(178, 34, 34, 0.2); /* Translucent red hover */
        }

        /* Form Inline Style for Delete Button */
        form {
            display: inline-block;
        }

        /* Links */
        a {
            text-decoration: none;
            color: var(--primary-red);
            transition: color 0.3s ease;
        }

        a:hover {
            color: var(--dark-red);
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .table th,
            .table td {
                font-size: 12px;
                padding: 10px;
            }

            h1 {
                font-size: 2em;
            }

            .btn {
                padding: 10px 14px;
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    <h1>Productos</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Crear Nuevo Producto</a>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Modelo</th>
                <th>Precio</th>
                <th>Disponibilidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->model }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->availability }}</td>
                    <td>
                        <a href="{{ route('products.show', $product->slug) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('products.edit', $product->slug) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
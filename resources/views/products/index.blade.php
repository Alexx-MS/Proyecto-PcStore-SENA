<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>productos</title>
    <Style>
        /* General Styles */
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #1e1e2f; /* Fondo oscuro, elegante */
        color: #f5f5f5; /* Texto claro para buen contraste */
        margin: 0;
        padding: 20px;
    }

    h1 {
        text-align: center;
        color: #00c7ff; /* Azul eléctrico, inspirado en tecnología */
        font-size: 2.8em;
        margin-bottom: 20px;
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

    .btn-primary {
        background-color: #00c7ff; /* Azul llamativo */
        color: #fff;
    }

    .btn-primary:hover {
        background-color: #0078a3;
    }

    .btn-info {
        background-color: #ff9f43; /* Naranja vibrante */
        color: #fff;
    }

    .btn-info:hover {
        background-color: #cc7a33;
    }

    .btn-warning {
        background-color: #ffcd38; /* Amarillo brillante */
        color: #333;
    }

    .btn-warning:hover {
        background-color: #d4a82d;
    }

    .btn-danger {
        background-color: #ff5252; /* Rojo moderno */
        color: #fff;
    }

    .btn-danger:hover {
        background-color: #d43f3f;
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

    .alert-success {
        background-color: #38c172;
        color: #fff;
        border: 1px solid #2d995b;
    }

    /* Table Styles */
    .table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        background-color: #29293d; /* Fondo oscuro para contraste */
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
    }

    .table th,
    .table td {
        padding: 15px;
        text-align: left;
        color: #f5f5f5;
        border-bottom: 1px solid #39394d;
    }

    .table th {
        background-color: #00c7ff; /* Azul eléctrico */
        color: #1e1e2f;
        text-transform: uppercase;
        font-size: 14px;
    }

    .table-striped tr:nth-child(even) {
        background-color: #20202e; /* Gris oscuro */
    }

    .table-striped tr:hover {
        background-color: #33334d; /* Efecto hover */
    }

    /* Form Inline Style for Delete Button */
    form {
        display: inline-block;
    }

    /* Links */
    a {
        text-decoration: none;
        color: #00c7ff;
        transition: color 0.3s ease;
    }

    a:hover {
        color: #0078a3;
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
    </Style>
</head>
<body>
    <h1>Productos</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Create New Product</a>
    
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
                <th>Disponbilidad</th>
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
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estas Seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalles de: {{$product->name}}</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f9; /* Fondo claro para clientes */
            color: #333; /* Texto oscuro para un diseño limpio */
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #007bff; /* Azul profesional */
            font-size: 2.8em;
            margin-bottom: 30px;
        }

        /* Product Details */
        div {
            margin: 15px 0;
            padding: 10px;
            font-size: 18px;
            background-color: #fff; /* Fondo blanco para destacar */
            border-left: 5px solid #007bff; /* Barra azul */
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        div strong {
            color: #333; /* Etiquetas en un color oscuro neutro */
            font-weight: bold;
        }

        /* Buttons */
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
            margin-top: 20px;
            color: #fff;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: #007bff; /* Azul */
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d; /* Gris */
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .product-available {
            color: greenyellow;
        }

        .product-out-stock {
            color: red;
        }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            div {
                font-size: 16px;
                padding: 8px;
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
    <body>
        <h1>Detalles del Producto</h1>
    
        <div><strong>Nombre:</strong> {{ $product->name }}</div>
        <div><strong>Modelo:</strong> {{ $product->model }}</div>
        <div><strong>Precio:</strong> ${{ number_format($product->price, 2) }}</div>
        <div><strong>Descripción:</strong> {{ $product->description }}</div>
        <div><strong>Generación:</strong> {{ $product->generation }}</div>
        <div><strong>Fecha de Lanzamiento:</strong> {{ $product->release_date }}</div>
        <div><strong>Disponibilidad:</strong> 
            @if($product->availability)
                <span class="product-available">Disponible</span>
            @else
                <span class="product-out-stock">Agotado</span>
            @endif
        </div>
        <div><strong>Ficha Técnica:</strong> {{ $product->technical_specifications }}</div>
        <div><strong>Marca:</strong> {{ $product->brand }}</div>
    </body>
    
</body>
</html>
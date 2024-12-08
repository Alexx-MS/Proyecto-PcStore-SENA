@extends('layouts.app')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de: {{$product->name}}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }

        body {
            background-color: #121212; /* Fondo oscuro */
            color: #ddd; /* Texto claro */
            font-size: 16px;
            line-height: 1.6;
            padding: 20px;
        }

        .container {
            max-width: 1000px;
            margin: 2rem auto;
            padding: 2rem;
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
            background: rgba(30, 30, 30, 0.95); /* Fondo oscuro translúcido */
            border-radius: 10px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.6);
        }

        .product-image {
            flex: 1;
            text-align: center;
        }

        .product-image img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            transition: transform 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
        }

        .product-image img:hover {
            transform: scale(1.05);
        }

        .product-details {
            flex: 2;
            color: #ddd;
        }

        .product-title {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 1rem;
            color: #f1c40f; /* Amarillo brillante */
        }

        .product-price {
            font-size: 2rem;
            font-weight: bold;
            color: #e74c3c; /* Rojo */
            margin-bottom: 1rem;
        }

        .product-price .original-price {
            font-size: 1.2rem;
            color: #aaa;
            text-decoration: line-through;
            margin-right: 1rem;
        }

        .product-specs {
            margin: 1rem 0;
            padding-left: 1rem;
            color: #ddd;
        }

        .product-specs li {
            padding: 0.5rem 0;
            border-bottom: 1px solid #444;
        }

        .product-availability {
            margin: 1rem 0;
            font-size: 1.2rem;
        }

        .product-available {
            color: greenyellow;
        }

        .product-out-stock {
            color: red;
        }

        .btn-container {
            margin-top: 1.5rem;
            display: flex;
            gap: 1rem;
        }

        .quantity-container {
            display: inline-flex;
            align-items: center;
            border: 1px solid #444;
            border-radius: 5px;
            overflow: hidden;
            background-color: #222;
        }

        .quantity-input {
            width: 60px;
            padding: 5px;
            text-align: center;
            font-size: 1rem;
            color: #fff;
            background-color: transparent;
            border: none;
            outline: none;
        }

        .quantity-input::-webkit-inner-spin-button,
        .quantity-input::-webkit-outer-spin-button {
            -webkit-appearance: none;
            appearance: none;
            margin: 0;
        }

        .quantity-input:focus {
            border-color: #f1c40f;
            outline: none;
        }

        .add-to-cart-btn {
            background-color: #28a745; /* Verde brillante */
            border: none;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            font-weight: bold;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            margin-left: 10px;
        }

        .add-to-cart-btn:hover {
            background-color: #218838;
            transform: scale(1.05);
        }

        .add-to-cart-form {
            display: flex;
            align-items: center;
        }

        .btn {
            flex: 1;
            padding: 0.75rem;
            font-size: 1rem;
            font-weight: bold;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            background-color: #007bff;
        }

        .btn:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .payment-methods {
            margin-top: 2rem;
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            gap: 1rem;
            flex-wrap: wrap;
            border-top: 2px solid #444;
            padding-top: 1rem;
        }

        .payment-methods img {
            height: 50px;
            transition: transform 0.3s ease;
            border-radius: 8px;
            background-color: #333;
            padding: 5px;
        }

        .payment-methods img:hover {
            transform: scale(1.1);
        }

        #opiniones {
            margin-top: 30px;
            color: #ddd;
        }

        .opinion {
            background-color: #333;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .opinion strong {
            font-size: 1.1rem;
        }

        .opinion p {
            margin-top: 10px;
            color: #bbb;
        }

        .opinion .usefulness {
            margin-top: 10px;
            font-size: 0.9rem;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                gap: 1rem;
            }

            .product-title {
                font-size: 1.5rem;
            }

            .product-price {
                font-size: 1.5rem;
            }

            .btn {
                font-size: 1.2rem;
                padding: 1rem;
            }

            .payment-methods img {
                height: 40px;
            }
        }

        .rating-container {
            margin-top: 1rem;
            background-color: #222;
            padding: 1rem;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            color: #f1c40f;
            font-size: 1.2rem;
            text-align: center;
        }

        .rating-container strong {
            display: block;
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        #rating-system {
            max-width: 500px; /* Limita el ancho del sistema de calificación */
            margin: 0 auto; /* Centra el contenido */
            text-align: center; /* Alinea el texto al centro */
        }
        
        #rating-system h2 {
            font-size: 1.5rem;
            margin-bottom: 20px;
            color: #f1c40f;
        }
        
        .rating-controls {
            display: flex;
            justify-content: center;
            gap: 10px; /* Espacio entre controles */
            margin-bottom: 20px;
        }
        
        .control {
            font-size: 1.5rem; /* Tamaño más pequeño para los íconos 🎮 */
            cursor: pointer;
            transition: transform 0.2s ease, color 0.3s ease;
        }
        
        input[type="radio"] {
            display: none; /* Oculta los botones de radio originales */
        }
        
        input[type="radio"]:checked + .control {
            color: #28a745; /* Cambia el color del ícono seleccionado */
            transform: scale(1.2); /* Agranda el ícono seleccionado */
        }
        
        .control:hover {
            transform: scale(1.1); /* Agranda un poco al pasar el mouse */
            color: #f1c40f; /* Cambia a un color diferente al pasar el mouse */
        }
        
        textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 15px;
            font-size: 1rem;
            resize: vertical;
        }
        
        button {
            padding: 10px 20px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        button:hover {
            background-color: #0056b3;
        }

    /* Estilos generales para la lista de opiniones */
    #opinions-list {
        margin-top: 20px;
        font-family: Arial, sans-serif;
    }

    #opinions-list .opinion {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 15px;
        background-color: #f9f9f9;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    #opinions-list .opinion p {
        margin: 10px 0;
    }

    #opinions-list .opinion p strong {
        color: #333;
    }

    /* Botón "¿Te resultó útil?" */
    .useful-button {
        display: inline-block;
        padding: 8px 15px;
        font-size: 14px;
        font-weight: bold;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    /* Estilo cuando no está marcado */
    .useful-button:not(.marked) {
        background-color: rgba(0, 0, 0, 0.1);
        color: #333;
        border: 1px solid rgba(0, 0, 0, 0.2);
    }

    /* Estilo cuando está marcado */
    .useful-button.marked {
        background-color: #007bff; /* Azul bonito */
        color: white;
        border: 1px solid #0056b3;
        box-shadow: 0 2px 4px rgba(0, 123, 255, 0.5);
    }

    /* Hover para los botones */
    .useful-button:hover {
        opacity: 0.9;
        transform: scale(1.05);
    }

    /* Pequeña transición para el botón */
    .useful-button {
        transition: background-color 0.3s, color 0.3s, box-shadow 0.3s, transform 0.3s;
    }

        
        
    </style>
</head>
<body>

    <div class="container">

        <!-- Imagen del Producto -->
        <div class="product-image">
            <img src="{{ $product->image }}" alt="{{ $product->name }}">
        </div>

        <!-- Detalles del Producto -->
        <div class="product-details">
            <h1 class="product-title">{{ $product->name }}</h1>
            <div class="product-price">
                ${{ number_format($product->price, 2) }}
            </div>
            <p>{{ $product->description }}</p>

            <ul class="product-specs">
                <li><strong>Modelo:</strong> {{ $product->model }}</li>
                <li><strong>Generación:</strong> {{ $product->generation }}</li>
                <li><strong>Fecha de Lanzamiento:</strong> {{ $product->release_date }}</li>
                <li><strong>Marca:</strong> {{ $product->brand }}</li>
                <li><strong>Ficha Técnica:</strong> {{ $product->technical_specifications }}</li>
            </ul>

            <div class="product-availability">
                <strong>Disponibilidad: </strong>
                @if($product->availability)
                    <span class="product-available">Disponible</span>
                @else
                    <span class="product-out-stock">Agotado</span>
                @endif
            </div>

            <!-- Calificación promedio -->
            <aside class="rating-container">
                <strong>⭐ Calificación Promedio ⭐</strong>
                <p>{{ number_format($product->averageRating, 1) }} / 5</p>
            </aside>

            <!-- Botones de Acción -->
            <div class="btn-container">
                <form action="{{ route('cart.add', ['productId' => $product->id]) }}" method="POST" class="add-to-cart-form">
                    @csrf
                    <div class="quantity-container">
                        <input type="number" name="quantity" value="1" min="1" required class="quantity-input" step="1">
                    </div>
                    <button type="submit" class="btn add-to-cart-btn">Agregar al carrito</button>
                </form>
                <button class="btn">Comprar Ahora</button>
            </div>
        </div>

    </div>


    <div class="payment-methods">
        <p>Opciones de pago:</p>
        <img src="https://logotipoz.com/wp-content/uploads/2021/10/version-horizontal-large-logo-mercado-pago.webp" alt="Mercado Pago">
        <img src="https://comunidad.addi.com/assets/img/addi-logo.png" alt="Addi">
        <img src="https://upload.wikimedia.org/wikipedia/commons/a/ac/Davivienda_Logo.png" alt="Davivienda">
        <img src="https://feriadelavivienda.co/wp-content/uploads/2020/10/logo-bancolombia-2.png" alt="Bancolombia">
        <img src="https://1000marcas.net/wp-content/uploads/2019/12/BBVA-logo.png" alt="BBVA">
        <img src="https://cdn.worldvectorlogo.com/logos/logo-nequi-nuevo-1.svg" alt="Nequi">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/41/Visa_Logo.png/640px-Visa_Logo.png" alt="Visa">
        <img src="https://www.bximpresiondigital.com/wp-content/uploads/2018/09/efecty.png" alt="Efecty">
    </div>

    <div id="rating-system">
        <h2>Regálanos una opinión sobre este producto:</h2>
        <form action="{{ route('opinions.store') }}" method="POST">
            @csrf
            <div class="rating-controls">
                <input type="radio" name="rating" id="rating-1" value="1" required>
                <label for="rating-1" class="control">🎮</label>
    
                <input type="radio" name="rating" id="rating-2" value="2">
                <label for="rating-2" class="control">🎮🎮</label>
    
                <input type="radio" name="rating" id="rating-3" value="3">
                <label for="rating-3" class="control">🎮🎮🎮</label>
    
                <input type="radio" name="rating" id="rating-4" value="4">
                <label for="rating-4" class="control">🎮🎮🎮🎮</label>
    
                <input type="radio" name="rating" id="rating-5" value="5">
                <label for="rating-5" class="control">🎮🎮🎮🎮🎮</label>
            </div>
            <textarea name="comment" placeholder="Deja tu opinión aquí" required></textarea>
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <button type="submit">Enviar Opinión</button>
        </form>
    </div>    

    <div id="opinions-list">
        <h3>Opiniones de usuarios:</h3>
        @foreach ($product->opinions as $opinion)
            <div class="opinion">
                <p><strong>Usuario:</strong>{{ $opinion->user_name }}</p>
                <p><strong>Calificación:</strong> 
                    @for ($i = 1; $i <= $opinion->rating; $i++)
                        🎮
                    @endfor
                </p>
                <p><strong>Comentario:</strong> {{ $opinion->comment }}</p>
                <p>
                    <script src="{{ asset('js/usefulness.js') }}"></script>
                    <button class="useful-button {{ $opinion->usefulness ? 'marked' : '' }}" data-id="{{ $opinion->id }}">
                        {{ $opinion->usefulness ? 'Ya marcaste como útil' : '¿Te resultó útil?' }}
                    </button>
                    
                </p>
                <p><small>Fecha: {{ $opinion->date->format('d/m/Y') }}</small></p>
            </div>
        @endforeach
    </div>
    
</body>
</html>
@endsection
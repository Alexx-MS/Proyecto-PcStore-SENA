<!DOCTYPE html>
<html lang="es">
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

        /* Métodos de pago */
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

        /* Opiniones */
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

        /* Responsive Design */
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

            <!-- Botones de Acción -->
            <div class="btn-container">
                <button class="btn">Añadir al Carrito</button>
                <button class="btn">Comprar Ahora</button>
            </div>
        </div>

    </div>

    <!-- Métodos de Pago dentro del contenedor -->
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

    <!-- Sección de Opiniones -->
    <div id="opiniones">
        <h3>Opiniones del Producto</h3>
    
        <!-- Mostrar las opiniones -->
        @foreach ($product->opinions as $opinion)
            <div class="opinion">
                <strong>{{ $opinion->user->name ?? 'Usuario Anónimo' }}</strong><br>
                Calificación: 
                @if ($opinion->rating)
                    {{ $opinion->rating }} estrellas
                @else
                    No calificado aún
                @endif
                <br>
                Comentario: <p>{{ $opinion->comment ?? 'No se proporcionó comentario.' }}</p>
                Fecha: {{ $opinion->date }} <br>
                Utilidad: 
                @if ($opinion->usefulness)
                    <span style="color: green;">Útil</span>
                @else
                    <span style="color: red;">No útil</span>
                @endif
            </div>
        @endforeach
    </div>

</body>
</html>
@extends('layouts.app')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de: {{$product->name}}</title>
    <link rel="stylesheet" href="{{ asset('css/products/showUser.css') }}">
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
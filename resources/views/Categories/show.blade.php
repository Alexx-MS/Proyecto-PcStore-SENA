@extends('layouts.app')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos en: {{ $category->name }}</title>
    <style>
        body {
            background-color: #000;
            color: #fff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .category-details {
            text-align: center;
            margin: 20px 0;
        }

        .products-section {
            padding: 20px;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .product-card {
            background-color: #1a1a1a;
            border: 1px solid #333;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .product-card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(255, 255, 255, 0.2);
        }

        .product-image {
            width: 100%; 
            height: 150px;
            overflow: hidden; 
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #222; 
        }

        .product-image img {
            max-width: 100%;
            max-height: 100%;
            object-fit: cover; 
            border-radius: 5px; 
        }

        .product-info {
            padding: 15px;
        }

        .product-name {
            font-size: 18px;
            font-weight: bold;
            margin: 0 0 10px;
        }

        .product-description {
            font-size: 14px;
            color: #bbb;
            margin: 0 0 10px;
        }

        .product-price {
            font-size: 16px;
            font-weight: bold;
            color: #ff5722;
            margin: 0 0 10px;
        }

        .product-rating {
            font-size: 14px;
            margin: 10px 0;
        }

        .product-rating span {
            color: #ffcc00;
            margin-right: 5px;
        }

        .product-link {
            display: inline-block;
            background-color: #ff5722;
            color: #fff;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            text-align: center;
        }

        .product-link:hover {
            background-color: #e64a19;
        }
    </style>
</head>
<body>

    <!-- Detalles de la categoría -->
    <div class="category-details">
        <h1>Categoría: {{ $category->name }}</h1>
        <p class="category-description">
            <strong>Descripción:</strong> 
            {{ $category->description ?? 'No hay descripción disponible.' }}
        </p>
    </div>

    <!-- Sección de productos -->
    <div class="products-section">
        <h2>Productos en esta categoría:</h2>
        @if($category->products->isEmpty())
            <p class="no-products">No hay productos en esta categoría.</p>
        @else
            <!-- Grid de productos -->
            <div class="products-grid">
                @foreach ($category->products as $product)
                    <div class="product-card">
                        <!-- Imagen del producto -->
                        <div class="product-image">
                            @if ($product->image)
                                <img src="{{ $product->image }}" alt="{{ $product->name }}">
                            @else
                                <img src="{{ asset('images/no-image.png') }}" alt="Imagen no disponible">
                            @endif
                        </div>
                        <div class="product-info">
                            <!-- Nombre del producto -->
                            <h3 class="product-name">{{ $product->name }}</h3>
                            <!-- Rating del producto -->
                            <div class="product-rating">
                                @php
                                    $averageRating = $product->averageRating ?? 0;
                                    $fullStars = floor($averageRating);
                                    $hasHalfStar = $averageRating - $fullStars > 0.5;
                                @endphp

                                <!-- Estrellas llenas -->
                                @for ($i = 0; $i < $fullStars; $i++)
                                    <span>&#9733;</span> <!-- Estrella llena -->
                                @endfor

                                <!-- Media estrella -->
                                @if ($hasHalfStar)
                                    <span>&#9734;</span> <!-- Media estrella -->
                                @endif

                                <!-- Estrellas vacías -->
                                @for ($i = $fullStars + ($hasHalfStar ? 1 : 0); $i < 5; $i++)
                                    <span>&#9734;</span> <!-- Estrella vacía -->
                                @endfor
                                <small>({{ number_format($averageRating, 1) }}/5)</small>
                            </div>
                            <!-- Descripción breve -->
                            <p class="product-description">{{ Str::limit($product->description, 100) }}</p>
                            <!-- Precio -->
                            <p class="product-price">${{ number_format($product->price, 0, ',', '.') }}</p>
                            <!-- Enlace para ver detalles -->
                            <a href="{{ route('products.showUser', $product->slug) }}" class="product-link" title="ver detalles del producto">Ver Detalles</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</body>
@endsection

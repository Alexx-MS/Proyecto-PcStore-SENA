@extends('layouts.app')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos en: {{ $category->name }}</title>
    <link rel="stylesheet" href="{{ asset('css/categories/show.css') }}">
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
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="product-image">
                        @else
                            <img src="{{ asset('images/no-image.png') }}" alt="Imagen no disponible" class="product-image">
                        @endif
                        <div class="product-info">
                            <!-- Nombre del producto -->
                            <h3 class="product-name">{{ $product->name }}</h3>
                            <!-- Descripción breve -->
                            <p class="product-description">{{ Str::limit($product->description, 100) }}</p>
                            <!-- Precio -->
                            <p class="product-price">${{ number_format($product->price, 0, ',', '.') }}</p>
                            <!-- Enlace para ver detalles -->
                            <a href="{{ route('products.showUser', $product->slug) }}" class="product-link" title="ver detalles del producto">Ver detalles</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <div class="other-categories">
        <!-- Aquí puedes agregar más enlaces a otras categorías si lo deseas -->
    </div>

</body>
@endsection

@extends('layouts.app')

@section('content')

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<div class="container">
    <h1>Configuración de tu PC</h1>
    <p><strong>Presupuesto:</strong> ${{ $budget }}</p>
    

    <div class="products-grid">
        @forelse($products as $product)
            <div class="product-card">
                <div class="product-image">
                    @if(isset($product->image))
                        <img src="{{ $product->image }}" alt="{{ $product->name }}">
                    @else
                        <img src="{{ asset('images/no-image.png') }}" alt="Imagen no disponible">
                    @endif
                </div>
                <div class="product-info">
                    <h3 class="product-name">{{ $product->name }}</h3>
                    <p class="product-category">Categoría: {{ $product->category->name }}</p>
                    <p class="product-price">Precio: ${{ $product->price }}</p>
                </div>
            </div>
        @empty
            <p>No se encontraron productos dentro del presupuesto.</p>
        @endforelse
    </div>

    <a href="{{ route('configurator.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>

<style>
    body {
        background-color: #000;
        color: #fff;
        font-family: Arial, sans-serif;
    }

    .container {
        max-width: 1200px;
        margin: auto;
        padding: 20px;
    }

    h1 {
        text-align: center;
        color: #fff;
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
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .product-card:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 8px rgba(255, 255, 255, 0.2);
    }

    .product-image {
        width: 100%;
        height: 200px;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #222;
    }

    .product-image img {
        max-width: 100%;
        max-height: 100%;
        object-fit: cover;
    }

    .product-info {
        padding: 15px;
        text-align: center;
    }

    .product-name {
        font-size: 18px;
        font-weight: bold;
    }

    .product-category {
        font-size: 14px;
        color: #bbb;
    }

    .product-price {
        font-weight: bold;
        color: #ff5722;
    }

    .btn-secondary {
        display: inline-block;
        background-color: #555;
        color: #fff;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
        text-align: center;
    }

    .btn-secondary:hover {
        background-color: #777;
    }
</style>

@endsection

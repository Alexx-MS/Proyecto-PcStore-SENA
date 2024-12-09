@extends('layouts.app')

@section('content')
<head>
    <link rel="stylesheet" href="{{ asset('css/cart/index.css') }}">
</head>
<div class="container">
    <h2>Carrito de Compras</h2>

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if (count($cartItems) > 0)
        <div class="cart-grid">
            @foreach ($cartItems as $productId => $item)
                <div class="product-card">
                    <!-- Imagen del producto -->
                    @if (isset($item['image']))
                    <div class="product-image">
                        <img src="{{ $image['image'] }}" alt="{{ $image['name'] }}">
                    </div>
                    @else
                    <div class="product-image">
                        <img src="{{ asset('images/no-image.png') }}" alt="Imagen no disponible">
                    </div>
                    @endif

                    <div class="product-info">
                        <!-- Nombre del producto -->
                        <h3 class="product-name">{{ $item['name'] }}</h3>
                        <!-- Cantidad -->
                        <p class="product-description">Cantidad: {{ $item['quantity'] }}</p>
                        <!-- Precio unitario -->
                        <p class="product-price">Precio unitario: ${{ number_format($item['price'], 2) }}</p>
                        <!-- Total -->
                        <p class="product-price">Total: ${{ number_format($item['price'] * $item['quantity'], 2) }}</p>
                        <!-- Botón de eliminar -->
                        <form action="{{ route('cart.remove', $productId) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="product-link delete-btn">Eliminar</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="cart-total">
            <h3>Total: ${{ number_format($totalAmount, 2) }}</h3>
            <a href="{{ route('cart.checkout') }}" class="checkout-btn">Proceder al pago</a>
        </div>
    @else
        <p class="no-products">No hay productos en el carrito.</p>
    @endif
</div>
@endsection

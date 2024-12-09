@extends('layouts.app')

@section('content')
<head>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<div class="content">
    <h1>Productos Mejor Calificados</h1>
    <div id="topRatedCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($topRatedProducts as $index => $product)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    <div class="d-flex justify-content-center align-items-center flex-column">
                        <img src="{{ $product->image }}" class="d-block w-50" alt="{{ $product->name }}">
                        <div class="carousel-caption d-md-block">
                            <h5>{{ $product->name }}</h5>
                            <p class="price">${{ number_format($product->price, 2) }}</p>
                            <p class="rating">
                                Calificación: 
                                @if ($product->opinions_avg_rating)
                                    {{ number_format($product->opinions_avg_rating, 1) }} / 5
                                @else
                                    Sin calificaciones aún
                                @endif
                            </p>
                            <a href="{{ route('products.showUser', $product->slug) }}" class="btn btn-primary">Ver Producto</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#topRatedCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#topRatedCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>
</div>

<div class="presupuesto mt-5">
    <h2>¡Nos adaptamos a tu presupuesto!</h2>
    <p>Indica tu presupuesto y encuentra lo que necesitas</p>
    <button>Inicia tu presupuesto</button>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection

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
                    <div class="d-flex flex-column align-items-center">
                        <img src="{{ $product->image }}" class="product-image" alt="{{ $product->name }}">
                        <div class="product-info">
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

<!-- Botones estilizados -->
<div class="button-section">
    <!-- Botón Tarjetas Gráficas -->
    <a href="http://127.0.0.1:8000/categories/tarjetas-graficas" class="action-button" style="background-image: url('https://asset.msi.com/resize/image/global/product/product_3_20171012153630_59df1b7ecd614.png62405b38c58fe0f07fcef2367d8a9ba1/400.png'); background-position: center;">
        <div class="button-content">
            <h3>Mas Gráficos</h3>
            <p>Tarjetas Gráficas</p>
        </div>
    </a>

    <!-- Botón Fuentes de Poder -->
    <a href="http://127.0.0.1:8000/categories/fuentes-de-alimentacion" class="action-button" style="background-image: url('https://symcomputadores.com/wp-content/uploads/2023/02/FUENTE-DE-PODER-JN-780W-PLUSFUENTE-DE-PO.png'); background-position: center;">
        <div class="button-content">
            <h3>+ Energía</h3>
            <p>Fuentes de poder</p>
        </div>
    </a>

    <!-- Botón Refrigeración -->
    <a href="http://127.0.0.1:8000/categories/refrigeraciones" class="action-button" style="background-image: url('https://es.marsgaming.eu/uploads/_thumnails/ml240_960x960.png'); background-position: center;">
        <div class="button-content">
            <h3>+ Cool</h3>
            <p>Refrigeración</p>
        </div>
    </a>

    <!-- Botón Almacenamiento -->
    <a href="http://127.0.0.1:8000/categories/almacenamiento" class="action-button" style="background-image: url('https://breldyng.com.ec/wp-content/uploads/2024/04/23-P-SU650_04.png'); background-position: center;">
        <div class="button-content">
            <h3>+ Almacenamiento</h3>
            <p>Discos y SSD</p>
        </div>
    </a>

    <!-- Botón Procesadores -->
    <a href="http://127.0.0.1:8000/categories/procesadores" class="action-button" style="background-image: url('https://revistasociosams.com/wp-content/uploads/2021/11/Procesadores-intel.png'); background-position: center;">
        <div class="button-content">
            <h3>+ Rendimiento</h3>
            <p>Procesadores</p>
        </div>
    </a>
</div>



<!-- Sección de presupuesto -->
<div class="presupuesto mt-5">
    <h2>¡Nos adaptamos a tu presupuesto!</h2>
    <p>Indica tu presupuesto y encuentra lo que necesitas</p>
    <a class="btn-buscar" href="{{ route('configurator.index') }}">Buscar Productos</a>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection

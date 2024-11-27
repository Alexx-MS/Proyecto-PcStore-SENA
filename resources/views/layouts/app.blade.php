<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PCSTORE - Componentes de PC</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

    <!-- Cabecera -->
    <header class="header container-fluid bg-light py-3">
        <div class="d-flex align-items-center justify-content-between">
            <div class="logo">
                <img src="{{ asset('images/logo.jpeg') }}" alt="Logo de PCSTORE" class="img-fluid" style="max-width: 150px;">
            </div>
            <a href="{{ view('offers') }}" class="btn btn-primary">Ofertas</a>
            <div class="search-bar d-flex flex-grow-1 mx-3">
                <input type="text" class="form-control me-2" placeholder="Busca miles de componentes...">
                <button class="btn btn-secondary">🔍</button>
            </div>
            <button class="cart-button btn btn-warning d-flex align-items-center">
                <img src="{{ asset('images/cart-icon.png') }}" alt="Carrito" class="me-2" style="max-width: 20px;">
                Carrito
            </button>
        </div>
    </header>

    <!-- Contenido principal -->
    <main class="content container mt-4">
        @yield('content')
    </main>

    <!-- Pie de página -->
    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

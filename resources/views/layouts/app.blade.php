<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PCSTORE - Componentes de PC</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>

    <!-- Cabecera -->
    <div class="header">
        <div class="logo">
            <img src="{{ asset('images/logo.jpeg') }}" alt="Logo de PCSTORE">
        </div>

        
</div>

            <a href="{{ view('offers') }}">Ofertas</a>
        </div>

        <div class="search-bar">
            <input type="text" placeholder="Busca miles de componentes...">
            <button>🔍</button>
        </div>

        <button class="cart-button">
            <img src="{{ asset('images/cart-icon.png') }}" alt="Carrito">
            Carrito
        </button>
    </div>

    <!-- Contenido principal -->
    <div class="content">
        @yield('content')
    </div>

    <!-- Pie de pagina -->
    <div class="footer">
        @include('partials.footer')
    </div>

</body>
</html>

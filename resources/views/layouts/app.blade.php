<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PCSTORE - Componentes de PC</title>
    <!-- Vincula el CSS usando la función asset() de Laravel -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>

    <!-- Cabecera -->
    <div class="header">
        <div class="logo">
            <img src="{{ asset('logo.jpeg') }}" alt="logo">
        </div>

        <div class="nav">
            <a href="#">Inicio</a>
            <div class="category">
                <a href="#">Categoría</a>
                <div class="categories">
                    <a href="#">Tarjetas Gráficas</a>
                    <a href="#">Procesadores</a>
                    <a href="#">Mouses</a>
                    <a href="#">Motherboards</a>
                    <a href="#">Monitores</a>
                    <a href="#">Laptops</a>
                </div>
            </div>
            <a href="#">Ofertas</a>
        </div>

        <div class="search-bar">
            <input type="text" placeholder="Busca miles de componentes...">
            <button>🔍</button>
        </div>

        <button class="cart-button">
            <img src="https://img.icons8.com/ios-filled/50/ffffff/shopping-cart.png" alt="Carrito">
            Carrito
        </button>
    </div>

    <!-- Contenido principal (esto es donde se inyectará el contenido específico de cada vista) -->
    <div class="content">
        @yield('content')
    </div>

    <!-- Pie de página -->
    <div class="footer">
        Si deseas ayuda personalizada da clic aquí
    </div>

</body>
</html>

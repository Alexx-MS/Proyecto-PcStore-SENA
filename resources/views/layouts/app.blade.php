<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PCSTORE - Componentes de PC</title>
    <style>
        /* Aquí van los estilos comunes que ya tienes para el navbar, fondo, etc. */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f4f4;
            color: #333;
        }

        .header {
            background-color: #1a1a1a;
            color: #fff;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }

        .header .logo img {
            height: 50px;
        }

        .nav {
            display: flex;
            gap: 30px;
        }

        .nav a {
            color: #fff;
            text-decoration: none;
            font-size: 1.1em;
            font-weight: bold;
            transition: color 0.3s;
        }

        .nav a:hover {
            color: #ff5e5e;
        }

        /* Menú de Categorías */
        .category {
            position: relative;
        }

        .categories {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #333;
            width: 200px;
            border-radius: 8px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            z-index: 10;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
            transform: translateY(-10px);
        }

        .category:hover .categories {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        .categories a {
            color: #fff;
            padding: 12px 20px;
            display: block;
            text-decoration: none;
            transition: background-color 0.3s;
            border-bottom: 1px solid #444;
        }

        .categories a:hover {
            background-color: #ff5e5e;
        }

        /* Barra de búsqueda */
        .search-bar {
            background-color: #333;
            border-radius: 25px;
            display: flex;
            align-items: center;
            padding: 8px 20px;
            gap: 10px;
            max-width: 350px;
            width: 100%;
        }

        .search-bar input {
            border: none;
            background: none;
            outline: none;
            color: #fff;
            font-size: 1em;
            flex: 1;
        }

        .search-bar button {
            background: none;
            border: none;
            font-size: 1.3em;
            cursor: pointer;
            color: #ff5e5e;
        }

        .cart-button {
            background-color: #ff5e5e;
            padding: 10px 20px;
            border-radius: 25px;
            color: #fff;
            font-size: 1.1em;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .cart-button img {
            width: 20px;
            height: 20px;
        }

        /* Estilos de contenido y footer */
        .footer {
            background-color: #8b0000;
            color: #fff;
            text-align: center;
            padding: 20px;
            font-weight: bold;
            font-size: 1.2em;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .footer:hover {
            background-color: #a50000;
        }
    </style>
</head>
<body>

    <!-- Navbar (Header) -->
    <div class="header">
        <div class="logo">
            <img src="logo.jpeg" alt="logo">
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

    <!-- Contenido Principal (Este es el espacio donde el contenido de cada página se inyectará) -->
    @yield('content')

    <!-- Footer -->
    <div class="footer">
        Si deseas ayuda personalizada da clic aquí
    </div>

</body>
</html>

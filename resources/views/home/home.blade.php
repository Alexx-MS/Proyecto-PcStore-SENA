<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PCSTORE - Componentes de PC</title>
    <style>
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
            position: relative;
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

        .content {
            background: linear-gradient(135deg, #e0e0e0, #ffffff);
            padding: 50px 20px;
            text-align: center;
            color: #333;
        }

        .content h1 {
            font-size: 2.5em;
            margin-bottom: 30px;
            color: #333;
        }

        .products {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: center;
        }

        .product {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.1);
            width: 200px;
            padding: 20px;
            position: relative;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .product:hover {
            transform: scale(1.1);
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
        }

        .product img {
            max-width: 100%;
            border-radius: 10px;
        }

        .product-name {
            font-size: 1.2em;
            margin-top: 15px;
            font-weight: bold;
            color: #333;
        }

        .price {
            background: #333;
            color: #fff;
            font-size: 1.2em;
            font-weight: bold;
            padding: 8px 20px;
            border-radius: 20px;
            position: absolute;
            bottom: 15px;
            left: 50%;
            transform: translateX(-50%);
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .presupuesto {
            background-color: #1a1a1a;
            color: #fff;
            padding: 40px;
            margin: 50px auto;
            text-align: center;
            border-radius: 10px;
            max-width: 400px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2);
        }

        .presupuesto h2 {
            font-size: 2em;
            margin-bottom: 15px;
        }

        .presupuesto p {
            font-size: 1em;
            margin-bottom: 25px;
        }

        .presupuesto button {
            background-color: #ff5e5e;
            color: #fff;
            padding: 15px 30px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 1.1em;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .presupuesto button:hover {
            background-color: #ff8e8e;
        }

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

    <div class="header">
        <div class="logo">
            <img src="/images/Logo.jpeg" alt="logo">
        </div>

        <div class="nav">
            <a href="#">Inicio</a>
            <div class="category">
                <a href="#">Categoría</a>
                <div class="categories">
                    <a href="{{ route('categories.index') }}">Tarjetas Gráficas</a>
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
    <div class="content">
        <h1>Nuestros Productos Destacados</h1>
        <div class="products">
            <!-- Producto 1 -->
            <a href="Product1.html" class="product">
                <img src="https://cdnx.jumpseller.com/tienda-gamer-medellin/image/47208261/1024.png?1711994221" alt="Nvidia Geforce RTX 4090">
                <a href="{{ route('categories.show')}}">Nvidia Geforce RTX 4090</a>
                <div class="price">$8.990.000</div>
            </a>
    
            <!-- Producto 2 -->
            <a href="Product2.html" class="product">
                <img src="https://dlcdnwebimgs.asus.com/gain/DBFFDF8F-DA7F-442E-A293-D6EF8514254A" alt="ASUS ROG Zenith Extreme X399">
                <p class="product-name">ASUS ROG Zenith Extreme X399</p>
                <div class="price">$1.990.000</div>
            </a>
    
            <!-- Producto 3 -->
            <a href="Product3.html" class="product">
                <img src="https://static.wixstatic.com/media/a9655c_542c3235fee046629cb8bdf49f1a455e~mv2.png/v1/fill/w_980,h_980,al_c,q_90,usm_0.66_1.00_0.01,enc_auto/a9655c_542c3235fee046629cb8bdf49f1a455e~mv2.png" alt="Intel Core i9 13900KS">
                <p class="product-name">Intel Core i9 13900KS</p>
                <div class="price">$2.950.000</div>
            </a>
            <a href="Product44.html" class="product">
                <img src="https://mundocomputo.com/web/image/product.template/950/image_1024?unique=0b0eafe" alt="Logitech G Series G502">
                <p class="product-name">Logitech G Series G502</p>
                <div class="price">$163.990</div>
            </a>
            <a href="Product4.html" class="product">
                <img src="https://clonesyperifericos.com/wp-content/uploads/MSI-CREATOR-PRO-M16-16-CORE-I9-13950HX-QUADRO-RTX-3000-32GB-2TB-NVME-1.jpg" alt="Logitech G Series G502">
                <p class="product-name">Logitech G Series G502</p>
                <div class="price">$163.990</div>
            </a>
            <a href="Product5.html" class="product">
                <img src="https://panamericana.vtexassets.com/arquivos/ids/392175-800-auto?v=637565356191070000&width=800&height=auto&aspect=true" alt="Mouse Inalámbrico HP Z3700">
                <p class="product-name">Mouse Inalámbrico HP Z3700</p>
                <div class="price">$163.990</div>
            </a>
        </div>
    </div>
    
    <div class="presupuesto">
        <h2>¡Nos adaptamos a tu presupuesto!</h2>
        <p>Indica tu presupuesto y encuentra lo que necesitas</p>
        <button>Inicia tu presupuesto</button>
    </div>

    <div class="footer">
        Si deseas ayuda personalizada da clic aquí
    </div>

</body>
</html>
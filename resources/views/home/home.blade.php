<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PCSTORE - Componentes de PC</title>
    <link rel="stylesheet" href="{{ asset('css/home.css')}}">
</head>
<body>

    <div class="header">
        <div class="logo">
            <img src="/images/Logo.jpeg" alt="logo">
        </div>

        <div class="nav">
<<<<<<< Updated upstream
            <a href="{{ route('home') }}">Inicio</a>

            <div class="categories">
                <ul>
                    <li>
                        @foreach ($categories as $category)
                        <div class="category">
                            <h2>{{ $category->name }}</h2>
                            <a href="{{ route('categories.show', $category->slug) }}" class="btn btn-primary">
                                Ver producto
                            </a>
                        </div>
                        @endforeach
                    </li>
                </ul>
=======
            <a href="{{ route('home.home') }}">Inicio</a>
            <div class="category">Categorías
                <div class="categories">
                    @foreach ($categories as $category )
                    <a href="{{ $category->id }}">{{ category->name }}</a>
                    @endforeach
                </div>
>>>>>>> Stashed changes
            </div>
    </div>

        </div>
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
                <p>Nvidia Geforce RTX 4090</p>
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
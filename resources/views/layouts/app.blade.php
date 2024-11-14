<div class="header">
    <div class="logo">
        <img src="{{ asset('images/logo.jpeg') }}" alt="logo">
    </div>

    <div class="nav">
        <a href="{{ route('home') }}">Inicio</a>
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

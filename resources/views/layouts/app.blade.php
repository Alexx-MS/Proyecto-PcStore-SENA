<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PC Components Store</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
</head>
<body>
    
    <div class="header">
        <div class="logo">
            <img src="/images/Logo.jpeg" alt="logo">
        </div>

        <div class="search-bar">
            <input type="text" placeholder="Busca miles de componentes...">
            <button>🔍</button>
        </div>

        <div class="nav">
            <a href="{{ route('home') }}">Inicio</a>
            
            <div class="categories-dropdown">
                <button class="dropdown-toggle">Categorías</button>
                <ul class="dropdown-menu">
                    @foreach ($categories as $category)
                        <li>
                            <a href="{{ route('categories.show', $category->slug) }}">
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            
            <script src="{{ asset('js/cart.js') }}"></script>
            <a href="{{ route('cart.show') }}" class="btn btn-outline-light">
                🛒 Carrito 
                <span id="cart-count" class="badge bg-danger">{{ collect(session('cart', []))->sum('quantity') }}</span>
            </a>
            
            @auth
                @if (auth()->user()->user_type === 'ADMIN')
                    <a href="{{ route('profile') }}" class="btn btn-warning">⚙🤴</a>
                
                @elseif (auth()->user()->user_type === 'CLIENT')
                    <div class="user-profile">
                        <a href="{{ route('profile') }}" class="profile-btn btn btn-warning">
                            👤 {{ auth()->user()->name }}
                        </a>                        
                    </div>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary">Iniciar sesión</a>
                @endif
            @endauth
        </div>
        
        
    </div>

    <main class="main-content">
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 PCStore - Todos los derechos reservados</p>
        </div>
    </footer>
</body>
</html>
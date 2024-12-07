<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard del Administrador</title>
    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
</head>
<body>
    <header class="admin-header">
        <div class="container">
            <h1>Panel de Administración</h1>
            <nav class="admin-nav">
                <ul>
                    <li><a href="{{ route('home') }}">Inicio</a></li>
                    <li><a href="{{ route('profile')}}">Perfil</a></li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Salir</button>
                    </form>
                </ul>
            </nav>
        </div>
    </header>

    <main class="dashboard-container">
        <section class="dashboard-cards">
            <div class="card">
                <h2>Usuarios</h2>
                <p>Gestiona los usuarios registrados en el sistema.</p>
                <a href="{{ route('users.index') }}" class="btn">Administrar Usuarios</a>
            </div>
            <div class="card">
                <h2>Categorías</h2>
                <p>Gestiona las categorías de productos disponibles.</p>
                <a href="{{ route('categories.index') }}" class="btn">Administrar Categorías</a>
            </div>
            <div class="card">
                <h2>Productos</h2>
                <p>Gestiona el catálogo de productos de la tienda.</p>
                <a href="{{ route('products.index') }}" class="btn">Administrar Productos</a>
            </div>
        </section>
    </main>

    <footer class="admin-footer">
        <p>&copy; {{ date('Y') }} Tienda de Componentes. Todos los derechos reservados.</p>
    </footer>
</body>
</html>

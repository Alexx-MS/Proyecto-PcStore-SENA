@extends('layouts.app')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard del Administrador</title>
    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
</head>
<body>
    
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
    
</body>
</html>
@endsection
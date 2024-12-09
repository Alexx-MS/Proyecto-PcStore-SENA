<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías</title>
    <link rel="stylesheet" href="{{ asset('css/categories/index.css') }}">
</head>
<body>
    <div class="container">
        <h1 class="table-title">Gestión de Categorías</h1>
        <div class="create-category-container">
            <a href="{{ route('categories.create') }}" class="action-link">Crear Categoría</a>
        </div>

        @if(session('success'))
            <div style="text-align:center; margin: 1rem 0; color: var(--primary-red); font-weight: bold;">
                {{ session('success') }}
            </div>
        @endif

        <table class="category-table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <div class="action-links">
                                <a href="{{ route('categories.show', $category->slug) }}" class="action-link">Ver</a>
                                <a href="{{ route('categories.edit', $category->slug) }}" class="action-link">Editar</a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-link">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" style="text-align: center;">No hay categorías registradas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <a href="{{ route('admin.dashboard') }}" style="display: block; text-align: center; margin-top: 1rem; color: var(--primary-red); text-decoration: none;">Volver</a>
</body></html>

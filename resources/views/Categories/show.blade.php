<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Categoría: {{ $category->name }}</title>
</head>
<body>
    <!-- Mostrar detalles de la categoría -->
    <h1>Detalles de la Categoría: {{ $category->name}}</h1>

    <p><strong>Nombre:</strong> {{ $category->name }}</p>
    <p><strong>Slug:</strong> {{ $category->slug }}</p>
    <p><strong>Descripción:</strong> {{ $category->description ?? 'No hay descripción disponible.' }}</p>

    <!-- Mostrar productos de esta categoría -->
    <h2>Productos en esta categoría:</h2>
    @if($category->products->isEmpty())
        <p>No hay productos en esta categoría.</p>
    @else
        <ul>
            @foreach ($category->products as $product)
                <li>
                    <h3>{{ $product->name }}</h3>
                    <p>{{ $product->description }}</p>
                    @if ($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 200px; height: auto;">
                    @endif
                </li>
            @endforeach
        </ul>
    @endif

    <!-- Otras categorías -->
    <h2>Otras Categorías</h2>
    {{--  <ul>
        @foreach ($categories as $categoryItem)
            <li><a href="{{ route('categories.show', $categoryItem->id) }}">{{ $categoryItem->name }}</a></li>
        @endforeach
    </ul>  --}}

    <a href="{{ route('home')}}">Volver a el Inicio</a>
</body>
</html>

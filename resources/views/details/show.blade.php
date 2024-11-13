<!-- resources/views/details/show.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle #{{ $detail->id }}</title>
</head>
<body>
    <h1>Detalle #{{ $detail->id }}</h1>

    <p><strong>Cantidad:</strong> {{ $detail->quantity }}</p>
    <p><strong>Observaciones:</strong> {{ $detail->observations }}</p>

    <a href="{{ route('details.index') }}">Volver al Listado</a>
    <a href="{{ route('details.edit', $detail->id) }}">Editar</a>

    <form action="{{ route('details.destroy', $detail->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>
</body>
</html>

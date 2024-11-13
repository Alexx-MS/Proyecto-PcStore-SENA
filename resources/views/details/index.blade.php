<!-- resources/views/details/index.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Detalles</title>
</head>
<body>
    <h1>Listado de Detalles</h1>
    
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('details.create') }}">Crear Nuevo Detalle</a>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cantidad</th>
                <th>Observaciones</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($details as $detail)
                <tr>
                    <td>{{ $detail->id }}</td>
                    <td>{{ $detail->quantity }}</td>
                    <td>{{ $detail->observations }}</td>
                    <td>
                        <a href="{{ route('details.show', $detail->id) }}">Ver</a>
                        <a href="{{ route('details.edit', $detail->id) }}">Editar</a>
                        <form action="{{ route('details.destroy', $detail->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

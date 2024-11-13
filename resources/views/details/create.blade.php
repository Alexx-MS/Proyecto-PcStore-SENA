<!-- resources/views/details/create.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Detalle</title>
</head>
<body>
    <h1>Crear Nuevo Detalle</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color: red;">{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('details.store') }}" method="POST">
        @csrf
        <label for="quantity">Cantidad:</label>
        <input type="number" name="quantity" id="quantity" required>

        <label for="observations">Observaciones:</label>
        <textarea name="observations" id="observations"></textarea>

        <button type="submit">Guardar</button>
    </form>

    <a href="{{ route('details.index') }}">Volver al Listado</a>
</body>
</html>

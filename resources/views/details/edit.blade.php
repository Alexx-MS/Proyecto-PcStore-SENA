<!-- resources/views/details/edit.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Detalle #{{ $detail->id }}</title>
</head>
<body>
    <h1>Editar Detalle #{{ $detail->id }}</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color: red;">{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('details.update', $detail->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="quantity">Cantidad:</label>
        <input type="number" name="quantity" id="quantity" value="{{ $detail->quantity }}" required>

        <label for="observations">Observaciones:</label>
        <textarea name="observations" id="observations">{{ $detail->observations }}</textarea>

        <button type="submit">Actualizar</button>
    </form>

    <a href="{{ route('details.index') }}">Volver al Listado</a>
</body>
</html>

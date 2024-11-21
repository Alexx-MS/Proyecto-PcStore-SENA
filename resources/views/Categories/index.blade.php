<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías</title>
    <Style>
        /* Reseteo básico de márgenes y padding */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Estilo general de la página */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    color: #333;
    margin: 20px;
}

/* Título principal */
h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #007bff;
}

/* Estilo para el enlace de creación de categoría */
a {
    display: inline-block;
    background-color: #28a745;
    color: #fff;
    padding: 10px 20px;
    margin-bottom: 20px;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
}

a:hover {
    background-color: #218838;
}

/* Estilo para mensajes de éxito */
div {
    margin: 20px auto;
    padding: 10px;
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
    border-radius: 5px;
    text-align: center;
}

/* Estilo para la tabla */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

/* Estilos de las celdas de la tabla */
th, td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

/* Encabezado de la tabla */
th {
    background-color: #007bff;
    color: white;
}

/* Estilo para las filas de la tabla */
tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #e9ecef;
}

/* Estilo para los botones de acción (Editar, Eliminar) */
button {
    background-color: #dc3545;
    color: white;
    border: none;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #c82333;
}

/* Estilo para los enlaces de acción (Editar) */
a {
    color: black;
    text-decoration: none;
    font-weight: bold;
    margin-right: 10px;
    
}

a:hover {
    color: rgb(red, green, blue);
}

/* Estilo para los formularios de eliminación */
form {
    display: inline;
}


    </Style>
</head>
<body>
    <h1>Categorías</h1>

    <a href="{{ route('categories.create') }}">Crear Categoría</a>

    @if(session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>  
                    <td>
                        <a href="{{ route('categories.show', $category) }}">ver</a>
                        <a href="{{ route('categories.edit', $category) }}">Editar</a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline;">
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

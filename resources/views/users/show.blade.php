<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de Usuario</title>
</head>
<body>
    <h1>Detalles del Usuario</h1>

    <p><strong>Nombre Completo:</strong> {{ $user->full_name }}</p>
    <p><strong>Username:</strong> {{ $user->username }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Teléfono:</strong> {{ $user->phone }}</p>
    <p><strong>Dirección:</strong> {{ $user->address }}</p>
    <p><strong>Código Postal:</strong> {{ $user->postal_code }}</p>
    <p><strong>Fecha de Nacimiento:</strong> {{ $user->birth_date }}</p>
    <p><strong>Tipo de Usuario:</strong> {{ $user->user_type }}</p>
    <p><strong>Historia:</strong> {{ $user->history }}</p>
    <p><strong>Fecha de Registro:</strong> {{ $user->registration_date }}</p>

    <a href="{{ route('users.index') }}">Volver a la lista</a>
</body>
</html>

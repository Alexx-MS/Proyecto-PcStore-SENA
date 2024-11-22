<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
</head>
<body>
    <h1>Editar Usuario</h1>

    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="full_name">Nombre Completo</label>
            <input type="text" id="full_name" name="full_name" value="{{ $user->full_name }}" required>
        </div>

        <div>
            <label for="username">Username</label>
            <input type="text" id="username" name="username" value="{{ $user->username }}" required>
        </div>

        <div>
            <label for="password">Contraseña (deja vacío si no deseas cambiarla)</label>
            <input type="password" id="password" name="password">
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ $user->email }}" required>
        </div>

        <div>
            <label for="phone">Teléfono</label>
            <input type="text" id="phone" name="phone" value="{{ $user->phone }}" required>
        </div>

        <div>
            <label for="address">Dirección</label>
            <input type="text" id="address" name="address" value="{{ $user->address }}" required>
        </div>

        <div>
            <label for="postal_code">Código Postal</label>
            <input type="text" id="postal_code" name="postal_code" value="{{ $user->postal_code }}" required>
        </div>

        <div>
            <label for="birth_date">Fecha de Nacimiento</label>
            <input type="date" id="birth_date" name="birth_date" value="{{ $user->birth_date }}" required>
        </div>

        <div>
            <label for="user_type">Tipo de Usuario</label>
            <select id="user_type" name="user_type" required>
                <option value="ADMIN" {{ $user->user_type == 'ADMIN' ? 'selected' : '' }}>Admin</option>
                <option value="CLIENT" {{ $user->user_type == 'CLIENT' ? 'selected' : '' }}>Cliente</option>
            </select>
        </div>

        <div>
            <label for="registration_date">Fecha de Registro</label>
            <input type="date" id="registration_date" name="registration_date" value="{{ $user->registration_date }}" required>
        </div>

        <button type="submit">Actualizar</button>
    </form>
</body>
</html>

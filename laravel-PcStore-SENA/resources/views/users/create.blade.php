<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Usuario</title>
</head>
<body>
    <h1>Crear Usuario</h1>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        
        <label for="full_name">Nombre Completo:</label>
        <input type="text" id="full_name" name="full_name" required><br><br>

        <label for="username">Nombre de Usuario:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="phone">Teléfono:</label>
        <input type="number" id="phone" name="phone" required><br><br>

        <label for="address">Dirección:</label>
        <input type="text" id="address" name="address" required><br><br>

        <label for="postal_code">Código Postal:</label>
        <input type="number" id="postal_code" name="postal_code" required><br><br>

        <label for="birth_date">Fecha de Nacimiento:</label>
        <input type="date" id="birth_date" name="birth_date" required><br><br>

        <label for="user_type">Tipo de Usuario:</label>
        <select id="user_type" name="user_type" required>
            <option value="ADMIN">Administrador</option>
            <option value="CLIENT">Cliente</option>
        </select><br><br>

        <label for="history">Historial:</label>
        <textarea id="history" name="history"></textarea><br><br>

        <label for="registration_date">Fecha de Registro:</label>
        <input type="date" id="registration_date" name="registration_date" required><br><br>

        <button type="submit">Crear Usuario</button>
    </form>
</body>
</html>

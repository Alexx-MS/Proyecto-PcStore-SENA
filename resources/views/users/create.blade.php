<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro - Componentes PC</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.8), rgba(30, 30, 30, 0.9)), url("{{ asset('images/fondo.jpeg') }}");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #fff;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .register-container {
            background: rgba(0, 0, 0, 0.7);
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5);
            max-width: 450px;
            width: 100%;
            text-align: center;
            transition: transform 0.3s;
        }

        .register-container:hover {
            transform: scale(1.03);
        }

        .register-container h2 {
            color: #f8f9fa;
            margin-bottom: 1rem;
            font-size: 1.8rem;
        }

        .register-container img {
            width: 80px;
            margin-bottom: 1.5rem;
        }

        .form-control {
            margin-bottom: 1rem;
            text-align: left;
            width: 100%;
        }

        .form-control label {
            display: block;
            font-size: 0.9rem;
            color: #adb5bd;
        }

        .form-control input,
        .form-control select,
        .form-control textarea {
            width: 100%;
            padding: 0.75rem;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            outline: none;
            color: #333;
            background: #e9ecef;
            transition: background-color 0.3s;
        }

        .form-control input:focus,
        .form-control select:focus,
        .form-control textarea:focus {
            background-color: #fff;
            box-shadow: 0 0 5px #007bff;
        }

        .button-container {
            margin-top: 1.5rem;
        }

        .register-btn {
            width: 100%;
            padding: 0.75rem;
            font-size: 1rem;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }

        .register-btn:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .error-message {
            color: #ff4c4c;
            font-size: 0.9rem;
            margin-top: 0.5rem;
            display: none;
        }
    </style>
</head>
<body>

    <div class="register-container">
        <img src="https://cdn-icons-png.flaticon.com/512/1532/1532788.png" alt="Logo de Componentes" />
        <h2>Formulario de Registro</h2>
        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <div class="form-control">
                <label for="full_name">Nombre Completo:</label>
                <input type="text" id="full_name" name="full_name" required>
            </div>

            <div class="form-control">
                <label for="username">Nombre de Usuario:</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="form-control">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-control">
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-control">
                <label for="phone">Teléfono:</label>
                <input type="text" id="phone" name="phone" required>
            </div>

            <div class="form-control">
                <label for="address">Dirección:</label>
                <input type="text" id="address" name="address" required>
            </div>

            <div class="form-control">
                <label for="postal_code">Código Postal:</label>
                <input type="text" id="postal_code" name="postal_code" required>
            </div>

            <div class="form-control">
                <label for="birth_date">Fecha de Nacimiento:</label>
                <input type="date" id="birth_date" name="birth_date" required>
            </div>

            <div class="form-control">
                <label for="user_type">Tipo de Usuario:</label>
                <select id="user_type" name="user_type" required>
                    <option value="ADMIN">Administrador</option>
                    <option value="CLIENT">Cliente</option>
                </select>
            </div>

            <div class="form-control">
                <label for="history">Historial:</label>
                <textarea id="history" name="history" placeholder="Opcional..."></textarea>
            </div>

            <div class="form-control">
                <label for="registration_date">Fecha de Registro:</label>
                <input type="date" id="registration_date" name="registration_date" required>
            </div>

            <div class="button-container">
                <button type="submit" class="register-btn">Crear Usuario</button>
            </div>
        </form>
    </div>

</body>
</html>

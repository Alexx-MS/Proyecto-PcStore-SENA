<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | PCStore</title>
    <!--<link rel="stylesheet" href="{{ asset('css/login.css') }}"> -->
    <Style>
            body {
        margin: 0;
        font-family: Arial, sans-serif;
        background: linear-gradient(135deg, #1e90ff, #6633cc);
        color: #333;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
    }

    .login-card {
        background: #fff;
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        width: 100%;
        max-width: 400px;
        text-align: center;
    }

    .login-card h1 {
        margin-bottom: 1rem;
        color: #1e90ff;
        font-size: 24px;
    }

    .form-group {
        margin-bottom: 1rem;
        text-align: left;
    }

    .form-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 0.5rem;
    }

    .form-group input {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
    }

    .btn-login {
        width: 100%;
        padding: 0.75rem;
        background: #1e90ff;
        color: #fff;
        border: none;
        border-radius: 5px;
        font-size: 18px;
        font-weight: bold;
        cursor: pointer;
        margin-top: 1rem;
        transition: background 0.3s ease;
    }

    .btn-login:hover {
        background: #105bbd;
    }

    .register-link {
        margin-top: 1rem;
        font-size: 14px;
    }

    .register-link a {
        color: #1e90ff;
        text-decoration: none;
    }

    .register-link a:hover {
        text-decoration: underline;
    }
    </Style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <h1>Inicia Sesión</h1>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" id="email" name="email" placeholder="Tu correo" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" placeholder="Tu contraseña" required>
                </div>
                <button type="submit" class="btn-login">Entrar</button>
            </form>
            <p class="register-link">¿No tienes cuenta? <a href="#">Regístrate aquí</a></p>
        </div>
    </div>
</body>
</html>

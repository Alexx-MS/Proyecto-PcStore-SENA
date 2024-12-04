<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | PCStore</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
     
</head>
<body>
    <div class="background">
        <div class="overlay"></div>
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
    </div>
</body>
</html>

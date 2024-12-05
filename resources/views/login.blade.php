<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Control Xbox</title>
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
  <div class="controller">
    <div class="controller-body">
      <!-- Joysticks -->
      <div class="joystick left"></div>
      <div class="joystick right"></div>

      <!-- Botones de acción -->
      <div class="action-buttons">
        <div class="button top"></div>
        <div class="button right"></div>
        <div class="button bottom"></div>
        <div class="button left"></div>
      </div>

      <!-- Formulario en el centro del control -->
      <div class="login-form">
        <h1>Inicio de Sesión</h1>
        <form>
          <input type="text" placeholder="Usuario" required>
          <input type="password" placeholder="Contraseña" required>
          <button type="submit">Iniciar Sesión</button>
        </form>
        <a href="{{ route('users.create') }}" >¿Aun no tienes cuenta? Registrarse</a>
      </div>
    </div>
  </div>
</body>
</html>

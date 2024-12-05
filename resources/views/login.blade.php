<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>login-PcStore</title>
	<link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
<div class="login-box">
  <p>Inicio de sesión</p>
  <form>
    <div class="user-box">
      <input required="" name="" type="text">
      <label>Usuario</label>
    </div>
    <div class="user-box">
      <input required="" name="" type="password">
      <label>Contraseña</label>
    </div>
    <a href="{{ route('home')}}" >
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      Iniciar
    </a>
  </form>
  <br>
  <p> <a href="{{ route('users.create')}}" class="a2">¿No tienes cuenta? ¡CREALA AHORA!</a></p></br>
</div>
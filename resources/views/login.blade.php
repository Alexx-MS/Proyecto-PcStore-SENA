<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>login-PcStore</title>
	<link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

  @if ($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif


<div class="login-box">
  <p>Inicio de sesión</p>
  <form action="{{ route('login') }}" method="POST">
    @csrf
    <div class="user-box">
      <input type="email" name="email" id="email" required>
      <label>Email</label>
    </div>
    <div class="user-box">
      <input type="password"  name="password" id="password"  required>
      <label>Contraseña</label>
    </div>
    <button class="button-login" type="submit">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      Iniciar sesión
    </button>
  </form>
  <br>
  <p> <a href="{{ route('users.create')}}" class="a2">¿No tienes cuenta? ¡CREALA AHORA!</a></p></br>
</div>
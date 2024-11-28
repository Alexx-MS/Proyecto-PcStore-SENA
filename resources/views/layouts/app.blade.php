<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PCSTORE - Componentes de PC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Paleta de colores */
        :root {
            --primary-color: #e63946; /* Rojo brillante */
            --secondary-color: #1d1f21; /* Negro */
            --highlight-color: #f1faee; /* Gris claro */
        }

        body {
            background-color: var(--secondary-color);
            color: #fff;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: var(--secondary-color);
            color: #fff;
            padding: 15px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .logo img {
            max-width: 150px;
        }

        .search-bar input {
            border-radius: 25px;
            border: 2px solid var(--primary-color);
        }

        .search-bar button {
            background-color: var(--primary-color);
            border-radius: 50%;
            color: #fff;
            padding: 0.5rem;
        }

        .cart-button {
            background-color: var(--primary-color);
            border-radius: 25px;
            color: #fff;
            padding: 8px 15px;
            display: flex;
            align-items: center;
        }

        .cart-button img {
            width: 20px;
            margin-right: 10px;
        }

        .content {
            padding-top: 20px;
            display: flex;
            justify-content: center;
        }

        .register-container {
            background-color: rgba(0, 0, 0, 0.7);
            border-radius: 15px;
            padding: 30px;
            max-width: 500px;
            width: 100%;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.6);
        }

        .register-container h2 {
            color: var(--primary-color);
            font-size: 2rem;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-control {
            margin-bottom: 15px;
            background-color: #333;
            border-radius: 8px;
            border: none;
            padding: 12px;
        }

        .form-control label {
            color: #ccc;
            font-size: 1rem;
            margin-bottom: 8px;
        }

        .form-control input, .form-control select {
            background-color: #222;
            color: #fff;
            border-radius: 8px;
            padding: 10px;
            font-size: 1rem;
            width: 100%;
            border: 2px solid #333;
        }

        .form-control input:focus, .form-control select:focus {
            outline: none;
            border-color: var(--primary-color);
        }

        .register-btn {
            background-color: var(--primary-color);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-size: 1.2rem;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
        }

        .register-btn:hover {
            background-color: #d32f2f;
        }

        .error-message {
            color: #ff4c4c;
            font-size: 0.9rem;
            margin-top: 10px;
            display: none;
        }

        /* Estilo responsivo */
        @media (max-width: 768px) {
            .register-container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>

    <!-- Cabecera -->
    <header class="header container-fluid bg-dark py-3">
        <div class="d-flex align-items-center justify-content-between">
            <div class="logo">
                <img src="{{ asset('images/logo.jpeg') }}" alt="Logo de PCSTORE" class="img-fluid">
            </div>
            <div class="search-bar d-flex flex-grow-1 mx-3">
                <input type="text" class="form-control me-2" placeholder="Busca miles de componentes...">
                <button class="btn btn-secondary">🔍</button>
            </div>
            <button class="cart-button btn btn-warning d-flex align-items-center">
                <img src="{{ asset('images/cart-icon.png') }}" alt="Carrito" class="me-2" style="max-width: 20px;">
                Carrito
            </button>
        </div>
    </header>

    <!-- Contenido principal -->
    <main class="content container mt-4">
        <div class="register-container">
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
                    <label for="registration_date">Fecha de Registro:</label>
                    <input type="date" id="registration_date" name="registration_date" required>
                </div>

                <div class="button-container">
                    <button type="submit" class="register-btn">Crear Usuario</button>
                </div>
            </form>
        </div>
    </main>

    <!-- Pie de página -->
    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

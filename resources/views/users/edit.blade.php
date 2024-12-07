<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <style>
        :root {
            --deep-black: #121212;
            --soft-black: #1E1E1E;
            --dark-black: #0A0A0A;
            --primary-red: #FF3333;
            --dark-red: #CC0000;
            --light-text: #F4F4F4;
            --input-bg: #2C2C2C;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, var(--deep-black), var(--soft-black));
            color: var(--light-text);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 1rem;
        }

        .edit-container {
            background: rgba(30, 30, 30, 0.9);
            width: 100%;
            max-width: 900px;
            padding: 2.5rem;
            border-radius: 16px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 51, 51, 0.2);
        }

        .form-title {
            text-align: center;
            color: var(--primary-red);
            margin-bottom: 2rem;
            font-size: 2.5rem;
            font-weight: 700;
            letter-spacing: -1px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }

        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            margin-bottom: 0.5rem;
            font-weight: 500;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 1px;
            color: var(--primary-red);
        }

        .form-group input,
        .form-group select {
            padding: 0.75rem 1rem;
            background-color: var(--input-bg);
            border: 2px solid transparent;
            border-radius: 8px;
            color: var(--light-text);
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: var(--primary-red);
            box-shadow: 0 0 0 3px rgba(255, 51, 51, 0.2);
        }

        .password-hint {
            font-size: 0.75rem;
            color: rgba(255, 255, 255, 0.6);
            margin-top: 0.25rem;
        }

        .submit-btn {
            grid-column: 1 / -1;
            padding: 1rem;
            background-color: var(--primary-red);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 1rem;
        }

        .submit-btn:hover {
            background-color: var(--dark-red);
            transform: translateY(-3px);
            box-shadow: 0 7px 14px rgba(0, 0, 0, 0.25);
        }
    </style>
</head>
<body>
    <div class="edit-container">
        <h1 class="form-title">Editar Usuario</h1>
        @csrf
        @method('PUT')
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-grid">
                <div class="form-group">
                    <label for="full_name">Nombre Completo</label>
                    <input type="text" id="full_name" name="full_name" >
                </div>

                <div class="form-group">
                    <label for="username">Nombre de Usuario</label>
                    <input type="text" id="username" name="username" >
                </div>

                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password">
                    <span class="password-hint">Deja vacío si no deseas cambiarla</span>
                </div>

                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" id="email" name="email" >
                </div>

                <div class="form-group">
                    <label for="phone">Teléfono</label>
                    <input type="text" id="phone" name="phone" >
                </div>

                <div class="form-group">
                    <label for="address">Dirección</label>
                    <input type="text" id="address" name="address" >
                </div>

                <div class="form-group">
                    <label for="postal_code">Código Postal</label>
                    <input type="text" id="postal_code" name="postal_code" >
                </div>

                <div class="form-group">
                    <label for="birth_date">Fecha de Nacimiento</label>
                    <input type="date" id="birth_date" name="birth_date" >
                </div>

                <div class="form-group">
                    <label for="user_type">Tipo de Usuario</label>
                    <select id="user_type" name="user_type" required>
                        <option value="ADMIN">Administrador</option>
                        <option value="CLIENT">Cliente</option>
                    </select>
                </div>

                <button type="submit" class="submit-btn">Actualizar Información</button>
            </div>
        </form>
    </div>
</body>
</html>
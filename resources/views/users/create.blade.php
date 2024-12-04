<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario - Componentes PC</title>
    <style>
        :root {
            --primary-red: #FF3333;
            --dark-red: #CC0000;
            --deep-black: #121212;
            --soft-black: #1E1E1E;
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
            line-height: 1.6;
        }

        .registration-wrapper {
            width: 100%;
            max-width: 600px;
            background: rgba(30, 30, 30, 0.9);
            border-radius: 16px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.6);
            padding: 2.5rem;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 51, 51, 0.2);
            transition: all 0.3s ease;
        }

        .registration-wrapper:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(255, 51, 51, 0.2);
        }

        .form-title {
            text-align: center;
            margin-bottom: 2rem;
            color: var(--primary-red);
            font-size: 2.5rem;
            font-weight: 700;
            letter-spacing: -1px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--light-text);
            font-weight: 500;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 1px;
        }

        .form-input {
            width: 100%;
            padding: 0.75rem 1rem;
            background-color: var(--input-bg);
            border: 2px solid transparent;
            border-radius: 8px;
            color: var(--light-text);
            font-size: 1rem;
            transition: all 0.3s ease;
            outline: none;
        }

        .form-input:focus {
            border-color: var(--primary-red);
            box-shadow: 0 0 0 3px rgba(255, 51, 51, 0.2);
        }

        .submit-btn {
            width: 100%;
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

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--soft-black);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-red);
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="registration-wrapper">
        <h1 class="form-title">Registro</h1>
        <form>
            <div class="form-grid">
                <div class="form-group">
                    <label for="full_name">Nombre Completo</label>
                    <input type="text" id="full_name" class="form-input" required>
                </div>
                <div class="form-group">
                    <label for="username">Nombre de Usuario</label>
                    <input type="text" id="username" class="form-input" required>
                </div>
                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" id="email" class="form-input" required>
                </div>
                <div class="form-group">
                    <label for="phone">Teléfono</label>
                    <input type="tel" id="phone" class="form-input" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" class="form-input" required>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirmar Contraseña</label>
                    <input type="password" id="confirm_password" class="form-input" required>
                </div>
                <div class="form-group">
                    <label for="birth_date">Fecha de Nacimiento</label>
                    <input type="date" id="birth_date" class="form-input" required>
                </div>
                <div class="form-group">
                    <label for="user_type">Tipo de Usuario</label>
                    <select id="user_type" class="form-input" required>
                        <option value="CLIENT">Cliente</option>
                        <option value="ADMIN">Administrador</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="submit-btn">Crear Cuenta</button>
        </form>
    </div>
</body>
</html>
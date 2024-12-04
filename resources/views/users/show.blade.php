<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles de Usuario</title>
    <style>
        :root {
            --bg-dark: #121212;
            --bg-secondary: #1E1E1E;
            --text-primary: #FFFFFF;
            --text-secondary: #B0B0B0;
            --accent-red: #FF3B3B;
            --hover-red: #FF5252;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: var(--bg-dark);
            color: var(--text-primary);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .user-details {
            background-color: var(--bg-secondary);
            border-radius: 12px;
            width: 100%;
            max-width: 500px;
            padding: 30px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
            border: 1px solid rgba(255,59,59,0.2);
        }

        .user-details__title {
            text-align: center;
            color: var(--accent-red);
            margin-bottom: 25px;
            font-size: 24px;
            font-weight: bold;
        }

        .user-details__list {
            display: grid;
            gap: 15px;
        }

        .user-details__item {
            display: grid;
            grid-template-columns: 1fr 2fr;
            background-color: rgba(30,30,30,0.7);
            padding: 15px;
            border-radius: 8px;
            transition: all 0.3s ease;
            border: 1px solid transparent;
        }

        .user-details__item:hover {
            background-color: rgba(40,40,40,0.9);
            transform: scale(1.02);
            border-color: var(--accent-red);
            box-shadow: 0 5px 15px rgba(255,59,59,0.1);
        }

        .user-details__label {
            font-weight: 600;
            color: var(--accent-red);
            transition: color 0.3s ease;
        }

        .user-details__value {
            color: var(--text-secondary);
            transition: color 0.3s ease;
        }

        .user-details__item:hover .user-details__label {
            color: var(--hover-red);
        }

        .user-details__item:hover .user-details__value {
            color: var(--text-primary);
        }

        .user-details__back {
            display: block;
            text-align: center;
            margin-top: 25px;
        }

        .user-details__back-link {
            background-color: var(--accent-red);
            color: var(--text-primary);
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 6px;
            transition: background-color 0.3s ease;
        }

        .user-details__back-link:hover {
            background-color: var(--hover-red);
        }
    </style>
</head>
<body>
    <div class="user-details">
        <h1 class="user-details__title">Detalles del Usuario</h1>
        
        <div class="user-details__list">
            <div class="user-details__item">
                <span class="user-details__label">Nombre Completo</span>
                <span class="user-details__value">{{ $user->full_name }}</span>
            </div>
            <div class="user-details__item">
                <span class="user-details__label">Username</span>
                <span class="user-details__value">{{ $user->username }}</span>
            </div>
            <div class="user-details__item">
                <span class="user-details__label">Email</span>
                <span class="user-details__value">{{ $user->email }}</span>
            </div>
            <div class="user-details__item">
                <span class="user-details__label">Teléfono</span>
                <span class="user-details__value">{{ $user->phone }}</span>
            </div>
            <div class="user-details__item">
                <span class="user-details__label">Dirección</span>
                <span class="user-details__value">{{ $user->address }}</span>
            </div>
            <div class="user-details__item">
                <span class="user-details__label">Código Postal</span>
                <span class="user-details__value">{{ $user->postal_code }}</span>
            </div>
            <div class="user-details__item">
                <span class="user-details__label">Fecha de Nacimiento</span>
                <span class="user-details__value">{{ $user->birth_date }}</span>
            </div>
            <div class="user-details__item">
                <span class="user-details__label">Tipo de Usuario</span>
                <span class="user-details__value">{{ $user->user_type }}</span>
            </div>
            <div class="user-details__item">
                <span class="user-details__label">Historia</span>
                <span class="user-details__value">{{ $user->history }}</span>
            </div>
            <div class="user-details__item">
                <span class="user-details__label">Fecha de Registro</span>
                <span class="user-details__value">{{ $user->registration_date }}</span>
            </div>
        </div>

        <div class="user-details__back">
            <a href="#" class="user-details__back-link">Volver a la lista</a>
        </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
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
            padding: 2rem;
            line-height: 1.6;
        }

        .container {
            background: rgba(30, 30, 30, 0.9);
            border-radius: 16px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.6);
            padding: 2rem;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 51, 51, 0.2);
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .page-title {
            color: var(--primary-red);
            font-size: 2.5rem;
            font-weight: 700;
            letter-spacing: -1px;
        }

        .create-btn {
            background-color: var(--primary-red);
            color: white;
            text-decoration: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .create-btn:hover {
            background-color: var(--dark-red);
            transform: translateY(-3px);
        }

        .user-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        .user-table thead {
            background-color: var(--input-bg);
        }

        .user-table th,
        .user-table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid rgba(255, 51, 51, 0.1);
        }

        .user-table th {
            color: var(--primary-red);
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 1px;
        }

        .user-table tbody tr {
            transition: background-color 0.3s ease;
        }

        .user-table tbody tr:hover {
            background-color: rgba(255, 51, 51, 0.05);
        }

        .action-links {
            display: flex;
            gap: 0.5rem;
        }

        .action-link {
            text-decoration: none;
            color: var(--light-text);
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .action-link-view {
            background-color: #4CAF50;
        }

        .action-link-edit {
            background-color: #2196F3;
        }

        .action-link-delete {
            background-color: #F44336;
        }

        .action-links .action-link:hover {
            opacity: 0.8;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .create-btn {
                margin-top: 1rem;
            }

            .user-table {
                font-size: 0.9rem;
            }

            .user-table th,
            .user-table td {
                padding: 0.75rem;
            }

            .action-links {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Lista de Usuarios</h1>
            <a href="#" class="create-btn">Crear Usuario</a>
        </div>

        <table class="user-table">
            <thead>
                <tr>
                    <th>Nombre Completo</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Tipo de Usuario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>John Doe</td>
                    <td>johndoe</td>
                    <td>john@example.com</td>
                    <td>123-456-7890</td>
                    <td>ADMIN</td>
                    <td>
                        <div class="action-links">
                            <a href="#" class="action-link action-link-view">Ver</a>
                            <a href="#" class="action-link action-link-edit">Editar</a>
                            <a href="#" class="action-link action-link-delete">Eliminar</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Jane Smith</td>
                    <td>janesmith</td>
                    <td>jane@example.com</td>
                    <td>987-654-3210</td>
                    <td>CLIENT</td>
                    <td>
                        <div class="action-links">
                            <a href="#" class="action-link action-link-view">Ver</a>
                            <a href="#" class="action-link action-link-edit">Editar</a>
                            <a href="#" class="action-link action-link-delete">Eliminar</a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    <style>
        :root {
            --primary-red: #B22222;
            --dark-black: #121212;
            --light-black: #1E1E1E;
            --text-white: #F4F4F4;
            --hover-red: #8B0000;
            --border-color: #333333;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: var(--dark-black);
            color: var(--text-white);
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 1rem;
            background-color: var(--light-black);
            border-radius: 12px;
            box-shadow: 0 15px 30px rgba(178, 34, 34, 0.2);
        }

        .table-title {
            font-size: 2rem;
            font-weight: bold;
            color: var(--primary-red);
            text-align: center;
            margin-bottom: 2rem;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .user-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            border-radius: 12px;
            overflow: hidden;
        }

        .user-table thead {
            background-color: var(--primary-red);
        }

        .user-table th,
        .user-table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid var(--border-color);
        }

        .user-table th {
            color: var(--text-white);
            text-transform: uppercase;
            font-size: 0.9rem;
            letter-spacing: 1px;
        }

        .user-table tbody tr {
            background-color: var(--light-black);
            transition: background-color 0.3s ease;
        }

        .user-table tbody tr:hover {
            background-color: rgba(178, 34, 34, 0.1);
        }

        .action-links {
            display: flex;
            gap: 0.5rem;
        }

        .action-link {
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            font-size: 0.9rem;
            text-transform: uppercase;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .action-link-view {
            background-color: #2196F3;
            color: var(--text-white);
        }

        .action-link-edit {
            background-color: #FFC107;
            color: var(--dark-black);
        }

        .action-link-delete {
            background-color: var(--primary-red);
            color: var(--text-white);
        }

        .action-link:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        }

        @media (max-width: 768px) {
            .container {
                margin: 1rem;
                padding: 0.5rem;
            }

            .user-table {
                font-size: 0.9rem;
            }

            .action-links {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="table-title">Gestión de Usuarios</h1>
        <table class="user-table">
            <thead>
                <tr>
                    <th>Nombre Completo</th>
                    <th>Usuario</th>
                    <th>Correo Electrónico</th>
                    <th>Teléfono</th>
                    <th>Tipo de Usuario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->full_name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->user_type }}</td>
                        <td>
                            <div class="action-links">
                                <a href="{{ route('users.show', $user->id) }}" class="action-link action-link-view">Ver</a>
                                <a href="{{ route('users.edit', $user->id) }}" class="action-link action-link-edit">Editar</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-link action-link-delete">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align: center;">No hay usuarios registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <a href="{{ route ('admin.dashboard')}}">Volver</a>
</body>
</html>
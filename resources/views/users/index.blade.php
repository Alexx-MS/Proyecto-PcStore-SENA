
<head>
    <style>
        :root {
            --background-color: #f9f9f9;
            --primary-color: #2a9d8f;
            --secondary-color: #264653;
            --accent-color: #e76f51;
            --light-color: #ffffff;
            --dark-color: #333333;
            --text-color: #2d2d2d;
            --border-radius: 8px;
        }
        
        body {
            font-family: 'Roboto', sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }
        
        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 1rem;
            background-color: var(--light-color);
            border-radius: var(--border-radius);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
        }
        
        .table-title {
            font-size: 1.8rem;
            font-weight: bold;
            color: var(--secondary-color);
            margin-bottom: 1rem;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .user-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1rem;
        }
        
        .user-table thead {
            background-color: var(--primary-color);
            color: var(--light-color);
        }
        
        .user-table th,
        .user-table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        .user-table th {
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .user-table tbody tr:hover {
            background-color: #f0f0f0;
        }
        
        .user-table tbody td {
            color: var(--dark-color);
        }
        
        .action-links {
            display: flex;
            gap: 0.5rem;
        }
        
        .action-link {
            text-decoration: none;
            color: var(--light-color);
            padding: 0.5rem 1rem;
            border-radius: var(--border-radius);
            font-size: 0.9rem;
            transition: transform 0.3s ease, background-color 0.3s ease;
        }
        
        .action-link-view {
            background-color: var(--primary-color);
        }
        
        .action-link-edit {
            background-color: var(--secondary-color);
        }
        
        .action-link-delete {
            background-color: var(--accent-color);
        }
        
        .action-link:hover {
            transform: scale(1.05);
            opacity: 0.9;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .table-title {
                font-size: 1.5rem;
            }
        
            .user-table th,
            .user-table td {
                padding: 0.75rem;
            }
        
            .action-links {
                flex-wrap: wrap;
            }
        }
        
    </style>
</head>
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
                        <button type="submit" class="action-link action-link-delete" style="border:none;background:none;cursor:pointer;color:inherit;">
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

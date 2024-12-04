<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Nueva Orden</title>
    <style>
        :root {
            --primary: #ff4c4c;
            --dark: #1a1a1a;
            --light: #f8f9fa;
            --input-bg: #e9ecef;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: system-ui, -apple-system, sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, rgba(0,0,0,0.9), rgba(20,20,20,0.95));
            color: var(--light);
            display: grid;
            place-items: center;
            padding: 2rem;
        }

        .logo {
            position: fixed;
            top: 1.25rem;
            left: 1.25rem;
            width: 5rem;
            height: auto;
        }

        .container {
            width: 100%;
            max-width: 40rem;
            background: rgba(0,0,0,0.7);
            backdrop-filter: blur(10px);
            padding: 2.5rem;
            border-radius: 1rem;
            box-shadow: 0 1rem 2rem rgba(0,0,0,0.4);
        }

        h1 {
            font-size: 2rem;
            text-align: center;
            margin-bottom: 2rem;
            color: var(--light);
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .form-group label {
            font-size: 0.9rem;
            color: var(--light);
        }

        .form-group input,
        .form-group textarea {
            padding: 0.75rem;
            border: none;
            border-radius: 0.5rem;
            background: var(--input-bg);
            color: var(--dark);
            transition: all 0.3s ease;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            background: white;
            box-shadow: 0 0 0 3px rgba(255,76,76,0.3);
        }

        button {
            width: 100%;
            padding: 1rem;
            margin-top: 1.5rem;
            border: none;
            border-radius: 0.5rem;
            background: var(--primary);
            color: white;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        button:hover {
            background: #ff3333;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255,76,76,0.4);
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 1.5rem;
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .back-link:hover {
            color: #ff3333;
            text-shadow: 0 0 10px rgba(255,76,76,0.3);
        }

        .alert {
            background: var(--primary);
            padding: 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .error-list {
            list-style: none;
        }

        .error-list li {
            margin-bottom: 0.5rem;
        }

        @media (max-width: 768px) {
            .container {
                padding: 1.5rem;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <img class="logo" src="https://cdn-icons-png.flaticon.com/512/1532/1532788.png" alt="Logo">
    
    <div class="container">
        <h1>Crear Nueva Orden</h1>

        @if ($errors->any())
        <div class="alert">
            <ul class="error-list">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('orders.store') }}" method="POST">
            @csrf
            <div class="form-grid">
                <div class="form-group">
                    <label for="quantity">Cantidad:</label>
                    <input type="number" name="quantity" id="quantity" required>
                </div>

                <div class="form-group">
                    <label for="total_amount">Monto Total:</label>
                    <input type="number" name="total_amount" id="total_amount" required>
                </div>

                <div class="form-group">
                    <label for="status">Estado:</label>
                    <input type="text" name="status" id="status" required>
                </div>

                <div class="form-group">
                    <label for="date_time">Fecha y Hora:</label>
                    <input type="datetime-local" name="date_time" id="date_time" required>
                </div>

                <div class="form-group">
                    <label for="address">Dirección:</label>
                    <input type="text" name="address" id="address" required>
                </div>

                <div class="form-group">
                    <label for="estimated_delivery_date">Fecha de Entrega:</label>
                    <input type="date" name="estimated_delivery_date" id="estimated_delivery_date" required>
                </div>
                
                <div class="form-group" style="grid-column: 1 / -1;">
                    <label for="content">Contenido:</label>
                    <textarea name="content" id="content" required></textarea>
                </div>
            </div>

            <button type="submit">Crear Orden</button>
        </form>

        <a href="{{ route('orders.index') }}" class="back-link">Volver al Listado de Órdenes</a>
    </div>
</body>
</html>
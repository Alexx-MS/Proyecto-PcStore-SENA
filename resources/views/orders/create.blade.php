
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Nueva Orden</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.8), rgba(30, 30, 30, 0.9)), url("{{ asset('images/fondo.jpeg') }}");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #fff;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        /* Logo en la parte superior izquierda */
        .logo {
            position: absolute;
            top: 20px;
            left: 20px;
            width: 80px;
        }

        .container {
            background: rgba(0, 0, 0, 0.7);
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.6);
            max-width: 600px;
            width: 100%;
            text-align: center;
            transition: transform 0.3s;
        }

        .container:hover {
            transform: scale(1.03);
        }

        h1 {
            color: #f8f9fa;
            margin-bottom: 1.5rem;
            font-size: 2rem;
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 1.5rem;
            text-align: left;
            width: 100%;
        }

        .form-group label {
            display: block;
            font-size: 1rem;
            color: #e0e0e0;
            margin-bottom: 0.5rem;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 0.75rem;
            font-size: 1rem;
            border: none;
            border-radius: 8px;
            outline: none;
            color: #333;
            background: #e9ecef;
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            background-color: #fff;
            box-shadow: 0 0 5px 3px rgba(255, 77, 77, 0.5); /* Rojo brillante */
        }

        button {
            width: 100%;
            padding: 0.75rem;
            font-size: 1.1rem;
            background-color: #FF4C4C;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }

        button:hover {
            background-color: #ff2a2a;
            transform: scale(1.05);
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            color: #ff0000;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .back-link:hover {
            color: #ff3333;
            text-shadow: 0 0 5px rgba(255, 0, 0, 0.3);
        }

        /* Estilo para los mensajes de error */
        .alert {
            background-color: #ff4c4c;
            color: #fff;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            box-shadow: 0 0 10px rgba(255, 0, 0, 0.7);
        }

        .error-list {
            list-style: none;
            padding-left: 0;
        }

        .error-list li {
            margin-bottom: 0.5rem;
        }
    </style>
</head>
<body>

    <!-- Logo en la parte superior izquierda -->
    <img class="logo" src="https://cdn-icons-png.flaticon.com/512/1532/1532788.png" alt="Logo de Componentes" />

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
                <label for="content">Contenido:</label>
                <textarea name="content" id="content" required></textarea>
            </div>

            <div class="form-group">
                <label for="address">Dirección:</label>
                <input type="text" name="address" id="address" required>
            </div>

            <div class="form-group">
                <label for="estimated_delivery_date">Fecha Estimada de Entrega:</label>
                <input type="date" name="estimated_delivery_date" id="estimated_delivery_date" required>
            </div>

            <button type="submit">Crear Orden</button>
        </form>

        <a href="{{ route('orders.index') }}" class="back-link">Volver al Listado de Órdenes</a>
    </div>

</body>
</html>

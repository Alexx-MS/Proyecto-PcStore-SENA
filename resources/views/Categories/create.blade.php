<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Categoría</title>
    <style>
        /* Fondo inspirado en temática gamer */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            background: url('/images/fondo2.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            overflow: hidden;
        }

        /* Efecto de fondo */
        body::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            z-index: -1;
        }

        /* Título estilizado */
        h1 {
            text-align: center;
            color: #ff4b5c; /* Rojo vibrante */
            text-shadow: 0 0 10px rgba(255, 75, 92, 0.8);
            margin-bottom: 20px;
        }

        /* Estilo del formulario */
        form {
            background: rgba(20, 20, 30, 0.9);
            padding: 20px 30px;
            border-radius: 20px; /* Bordes redondeados */
            box-shadow: 0 0 15px rgba(255, 75, 92, 0.8);
            width: 100%;
            max-width: 400px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        /* Efecto hover en el formulario */
        form:hover {
            transform: scale(1.05); /* Efecto de zoom */
            box-shadow: 0 0 25px rgba(255, 75, 92, 1);
        }

        form div {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #fff;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ff4b5c;
            border-radius: 10px; /* Bordes más suaves */
            font-size: 16px;
            background: rgba(20, 20, 30, 0.9);
            color: #fff;
            outline: none;
            box-shadow: 0 0 5px rgba(255, 75, 92, 0.5);
            transition: box-shadow 0.3s ease, border-color 0.3s ease;
        }

        input[type="text"]:focus,
        textarea:focus {
            box-shadow: 0 0 10px rgba(255, 75, 92, 0.8);
            border-color: #ff4b5c;
        }

        textarea {
            resize: none;
            height: 100px;
        }

        /* Botón estilizado */
        button {
            width: 100%;
            padding: 12px;
            background-color: #ff4b5c;
            color: #000;
            border: none;
            border-radius: 10px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            text-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background-color: #d13b4a; /* Rojo más oscuro */
            transform: scale(1.05);
        }

        button:active {
            transform: scale(0.95);
        }

        /* Responsivo */
        @media (max-width: 500px) {
            form {
                padding: 15px 20px;
            }

            h1 {
                font-size: 20px;
            }

            button {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <form action="{{ route('categories.store') }}" method="POST">
        <h1>Crear Categoría</h1>
        @csrf
        <div>
            <label for="name">Nombre</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div>
            <label for="description">Descripción</label>
            <textarea id="description" name="description"></textarea>
        </div>

        <button type="submit">Guardar</button>
    </form>
</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PCSTORE - Registro de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #e63946;  /* Bright red */
            --secondary-color: #1d1f21; /* Dark charcoal */
            --background-color: #121212;
            --text-color: #f1f1f1;
            --input-bg: #2c2c2c;
        }

        body {
            background-color: var(--background-color);
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            color: var(--text-color);
        }

        .registration-wrapper {
            background-color: var(--secondary-color);
            border-radius: 12px;
            box-shadow: 0 15px 30px rgba(230, 57, 70, 0.2);
            padding: 40px;
            width: 100%;
            max-width: 600px;
            border: 2px solid var(--primary-color);
        }

        .form-title {
            text-align: center;
            color: var(--primary-color);
            margin-bottom: 30px;
            font-weight: bold;
        }

        .form-control {
            background-color: var(--input-bg);
            border: 1px solid var(--primary-color);
            color: var(--text-color);
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background-color: #3a3a3a;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(230, 57, 70, 0.3);
        }

        .form-label {
            color: #bbbbbb;
        }

        .btn-register {
            background-color: var(--primary-color);
            border: none;
            transition: all 0.3s ease;
            font-weight: bold;
        }

        .btn-register:hover {
            background-color: #d32f2f;
            transform: translateY(-3px);
        }
    </style>
</head>
<body>
    <div class="registration-wrapper">
        <h2 class="form-title">Registro de Usuario</h2>
        <form>
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="full_name" class="form-label">Nombre Completo</label>
                    <input type="text" class="form-control" id="full_name" required>
                </div>
                <div class="col-md-6">
                    <label for="username" class="form-label">Nombre de Usuario</label>
                    <input type="text" class="form-control" id="username" required>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" required>
                </div>
                <div class="col-md-6">
                    <label for="phone" class="form-label">Teléfono</label>
                    <input type="tel" class="form-control" id="phone" required>
                </div>
                <div class="col-12">
                    <label for="address" class="form-label">Dirección</label>
                    <input type="text" class="form-control" id="address" required>
                </div>
                <div class="col-md-4">
                    <label for="postal_code" class="form-label">Código Postal</label>
                    <input type="text" class="form-control" id="postal_code" required>
                </div>
                <div class="col-md-4">
                    <label for="birth_date" class="form-label">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" id="birth_date" required>
                </div>
                <div class="col-md-4">
                    <label for="user_type" class="form-label">Tipo de Usuario</label>
                    <select class="form-control" id="user_type" required>
                        <option value="ADMIN">Administrador</option>
                        <option value="CLIENT" selected>Cliente</option>
                    </select>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-register w-100 py-2">Crear Cuenta</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
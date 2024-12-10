@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Configura tu PC</h1>

    <form action="{{ route('pcconfigurator.create') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="budget">Presupuesto (USD):</label>
            <input type="number" name="budget" id="budget" class="form-control" placeholder="Ingresa tu presupuesto" required>
        </div>

        <button type="submit" class="btn mt-3">Configurar</button>
    </form>

</div>

<style>
    /* General */
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
        background-color: #121212; /* Fondo oscuro */
        color: #F5F5F5; /* Texto claro */
        font-family: Arial, sans-serif;
    }

    /* Contenedor Principal */
    .container {
        max-width: 600px;
        margin: 3rem auto;
        padding: 20px;
        background: #1E1E1E;
        border-radius: 15px;
    }

    /* Título Principal */
    h1 {
        text-align: center;
        font-weight: bold;
    }

    /* Formulario */
    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-weight: bold;
        color: #F5F5F5;
    }

    .form-control {
        width: 100%;
        padding: 15px;
        background-color: #1E1E1E;
        color: #F5F5F5;
        border: 1px solid #444;
        font-size: 1.2em;
    }

    .btn {
        background-color: #B22222;
        color: #F5F5F5;
        padding: 15px;
        font-weight: bold;
        text-align: center;
        display: inline-block;
        width: 100%;
        border: none;
        border-radius: 10px;
        text-decoration: none;
        font-size: 1.5em;
    }

    .btn:hover {
        background-color: #8B0000;
    }

    /* Sección presupuesto */
    .presupuesto {
        text-align: center;
        background: #1E1E1E;
        padding: 20px;
        margin-top: 20px;
        border-radius: 15px;
    }

    .presupuesto h2 {
        font-weight: bold;
    }

    .presupuesto .btn {
        display: inline-block;
        margin-top: 15px;
        color: #F5F5F5;
        background: #B22222;
        text-decoration: none;
        font-weight: bold;
    }

    .presupuesto .btn:hover {
        background: #8B0000;
    }
</style>
@endsection

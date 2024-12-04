@extends('layouts.app')

@section('content')
<style>
    /* General reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Body */
    body {
        font-family: 'Roboto', sans-serif;
        background: url('{{ asset('images/fondocrearproduct.jpg') }}') no-repeat center center fixed;
        background-size: cover;
        color: #333;
        line-height: 1.6;
    }

    /* Contenedor del formulario */
    .form-container {
        background-color: rgba(255, 255, 255, 0.9); /* Fondo semi-transparente */
        padding: 20px;
        margin: 20px auto;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        max-width: 800px;
    }

    .form-container h1 {
        font-size: 2rem;
        color: #111;
        margin-bottom: 20px;
        text-align: center;
    }

    /* Estilo de los inputs */
    .form-label {
        font-size: 1rem;
        color: #444;
        margin-bottom: 8px;
        display: block;
    }

    .form-control, .form-select {
        width: 100%;
        padding: 10px;
        font-size: 1rem;
        border: 1px solid #ccc;
        border-radius: 5px;
        transition: border-color 0.3s ease;
    }

    .form-control:focus, .form-select:focus {
        border-color: #5cb85c;
        outline: none;
    }

    /* Botón */
    .btn-success {
        background-color: #5cb85c;
        border: none;
        color: #fff;
        padding: 10px 20px;
        font-size: 1rem;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-success:hover {
        background-color: #4cae4c;
        transform: scale(1.05);
    }

    .btn-success:active {
        transform: scale(1);
    }

    /* Alertas */
    .alert {
        margin-bottom: 20px;
        padding: 15px;
        border-radius: 5px;
        font-size: 0.95rem;
    }

    .alert-danger {
        color: #a94442;
        background-color: #f2dede;
        border-color: #ebccd1;
    }

    /* Espaciado entre inputs */
    .row.g-3 > .col-md-6, 
    .row.g-3 > .col-md-12 {
        margin-bottom: 15px;
    }

    /* Responsividad */
    @media (max-width: 768px) {
        .form-container {
            padding: 15px;
        }

        .form-label {
            font-size: 0.9rem;
        }

        .btn-success {
            font-size: 0.9rem;
            padding: 8px 16px;
        }
    }
</style>

<div class="form-container container">
    <h1>Editar Producto</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $product->slug) }}" method="POST" class="row g-3">
        @csrf
        @method('PUT')
        <div class="col-md-6">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
        </div>
        <div class="col-md-6">
            <label for="model" class="form-label">Modelo</label>
            <input type="text" name="model" class="form-control" value="{{ old('model', $product->model) }}" required>
        </div>
        <div class="col-md-6">
            <label for="price" class="form-label">Precio</label>
            <input type="number" name="price" class="form-control" value="{{ old('price', $product->price) }}" required>
        </div>
        <div class="col-md-6">
            <label for="generation" class="form-label">Generación</label>
            <input type="text" name="generation" class="form-control" value="{{ old('generation', $product->generation) }}" required>
        </div>
        <div class="col-md-6">
            <label for="release_date" class="form-label">Fecha de Lanzamiento</label>
            <input type="date" name="release_date" class="form-control" value="{{ old('release_date', $product->release_date) }}" required>
        </div>
        <div class="col-md-6">
            <label for="availability" class="form-label">Disponibilidad</label>
            <input type="text" name="availability" class="form-control" value="{{ old('availability', $product->availability) }}" required>
        </div>
        <div class="col-md-12">
            <label for="description" class="form-label">Descripción</label>
            <textarea name="description" class="form-control" rows="3" required>{{ old('description', $product->description) }}</textarea>
        </div>
        <div class="col-md-12">
            <label for="technical_specifications" class="form-label">Ficha Técnica</label>
            <textarea name="technical_specifications" class="form-control" rows="3" required>{{ old('technical_specifications', $product->technical_specifications) }}</textarea>
        </div>
        <div class="col-md-12">
            <label for="brand" class="form-label">Marca</label>
            <input type="text" name="brand" class="form-control" value="{{ old('brand', $product->brand) }}" required>
        </div>
        <div class="col-md-12">
            <label for="category_id" class="form-label">Categoría</label>
            <select name="category_id" id="category_id" class="form-select" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-12 text-center">
            <button type="submit" class="btn-success">Editar Producto</button>
        </div>
    </form>
</div>
@endsection

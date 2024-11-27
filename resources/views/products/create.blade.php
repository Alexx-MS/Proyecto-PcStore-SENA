@extends('layouts.app')

@section('content')
<div class="form-container container">
    <h1 class="text-center mb-4">Crear Nuevo Producto</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" class="row g-3">
        @csrf
        <div class="col-md-6">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label for="model" class="form-label">Modelo</label>
            <input type="text" name="model" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label for="price" class="form-label">Precio</label>
            <input type="number" name="price" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label for="generation" class="form-label">Generación</label>
            <input type="text" name="generation" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label for="release_date" class="form-label">Fecha de Lanzamiento</label>
            <input type="date" name="release_date" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label for="availability" class="form-label">Disponibilidad</label>
            <input type="text" name="availability" class="form-control" required>
        </div>
        <div class="col-md-12">
            <label for="description" class="form-label">Descripción</label>
            <textarea name="description" class="form-control" rows="3" required></textarea>
        </div>
        <div class="col-md-12">
            <label for="technical_specifications" class="form-label">Ficha Técnica</label>
            <textarea name="technical_specifications" class="form-control" rows="3" required></textarea>
        </div>
        <div class="col-md-12">
            <label for="brand" class="form-label">Marca</label>
            <input type="text" name="brand" class="form-control" required>
        </div>
        <div class="col-md-12">
            <label for="category_id" class="form-label">Categoría</label>
            <select name="category_id" id="category_id" class="form-select" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-success">Crear Producto</button>
        </div>
    </form>
</div>
@endsection

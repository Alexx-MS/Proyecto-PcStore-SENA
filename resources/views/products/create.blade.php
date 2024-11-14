<h1>Create New Product</h1>

<Style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f6f9;
    color: #333;
    display: flex;
    justify-content: center;
    padding-top: 40px;
}

.container {
    max-width: 600px;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

h1 {
    font-size: 24px;
    font-weight: bold;
    color: #2c3e50;
    text-align: center;
    margin-bottom: 20px;
}

.alert {
    color: #d9534f;
    background-color: #f8d7da;
    border: 1px solid #f5c6cb;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 20px;
}

.alert ul {
    padding: 0;
    margin: 0;
    list-style-type: none;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    font-weight: bold;
    color: #555;
    display: block;
    margin-bottom: 5px;
}

.form-control {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
    transition: border-color 0.3s;
}

.form-control:focus {
    border-color: #3498db;
    outline: none;
}

textarea.form-control {
    resize: vertical;
    min-height: 100px;
}

.btn {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn-primary {
    background-color: #3498db;
    color: #fff;
}

.btn-primary:hover {
    background-color: #2980b9;
}

</Style>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="model">Modelo</label>
        <input type="text" name="model" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="price">Precio</label>
        <input type="number" name="price" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="description">Descripcion</label>
        <textarea name="description" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label for="generation">Generacion</label>
        <input type="text" name="generation" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="release_date">Fecha de Lanzamiento</label>
        <input type="date" name="release_date" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="availability">Disponibilidad</label>
        <input type="text" name="availability" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="technical_specifications">Ficha Tecnica</label>
        <textarea name="technical_specifications" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label for="brand">Marca</label>
        <input type="text" name="brand" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Crear Producto</button>
</form>

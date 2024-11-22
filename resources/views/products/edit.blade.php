<head>
    <Style>
            /* General Styles */
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #1e1e2f; /* Fondo oscuro tecnológico */
        color: #f5f5f5; /* Texto claro */
        margin: 0;
        padding: 20px;
    }

    h1 {
        text-align: center;
        color: #00c7ff; /* Azul eléctrico */
        font-size: 2.8em;
        margin-bottom: 20px;
    }

    /* Error Alert Styles */
    .alert {
        background-color: #ff5252;
        color: #fff;
        padding: 15px;
        border-radius: 5px;
        margin-bottom: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    }

    .alert ul {
        margin: 0;
        padding: 0;
        list-style-type: none;
    }

    .alert li {
        margin: 5px 0;
    }

    /* Form Styles */
    form {
        background-color: #29293d; /* Fondo del formulario */
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        max-width: 600px;
        margin: 0 auto;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        font-weight: bold;
        color: #ffcd38; /* Amarillo para destacar etiquetas */
        margin-bottom: 8px;
    }

    input[type="text"],
    input[type="number"],
    input[type="date"],
    textarea {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #39394d;
        border-radius: 5px;
        background-color: #1e1e2f;
        color: #f5f5f5;
    }

    textarea {
        height: 100px;
    }

    input:focus,
    textarea:focus {
        outline: none;
        border-color: #00c7ff; /* Azul eléctrico para foco */
        box-shadow: 0 0 5px rgba(0, 199, 255, 0.5);
    }

    /* Button Styles */
    .btn {
        display: inline-block;
        padding: 12px 18px;
        font-size: 16px;
        text-align: center;
        border: none;
        border-radius: 5px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
        color: #fff;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.3);
    }

    .btn-primary {
        background-color: #0078a3; /* Azul más oscuro para edición */
    }

    .btn-primary:hover {
        background-color: #005f80; /* Color al pasar el cursor */
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        form {
            padding: 15px;
        }

        label {
            font-size: 14px;
        }

        input,
        textarea {
            font-size: 14px;
        }

        .btn {
            font-size: 14px;
            padding: 10px 14px;
        }
    }

    </Style>
</head>

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

<form action="{{ route('products.update', $product) }}" method="POST">
    @csrf
    @method('PUT')
    <!-- Aquí repites los mismos campos que en create.blade.php pero con valores predeterminados -->
    <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
    </div>
    <div class="form-group">
        <label for="model">Modelo</label>
        <input type="text" name="model" class="form-control" value="{{ $product->model }}" required>
    </div>
    <div class="form-group">
        <label for="price">Precio</label>
        <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
    </div>
    <div class="form-group">
        <label for="description">Descripcion</label>
        <textarea name="description" class="form-control" value="{{ $product->description }}" required></textarea>
    </div>
    <div class="form-group">
        <label for="generation">Generacion</label>
        <input type="text" name="generation" class="form-control" value="{{ $product->generation }}" required>
    </div>
    <div class="form-group">
        <label for="release_date">Fecha de Lanzamiento</label>
        <input type="date" name="release_date" class="form-control" value="{{ $product->release_date }}" required>
    </div>
    <div class="form-group">
        <label for="availability">Disponibilidad</label>
        <input type="text" name="availability" class="form-control" value="{{ $product->availability }}" required>
    </div>
    <div class="form-group">
        <label for="technical_specifications">Ficha Tecnica</label>
        <textarea name="technical_specifications" class="form-control" value="{{ $product->technical_specifications }}" required></textarea>
    </div>
    <div class="form-group">
        <label for="brand">Marca</label>
        <input type="text" name="brand" class="form-control" value="{{ $product->brand }}" required>
    </div>

    <label for="category_id">Categoría:</label>
    <select name="category_id" id="category_id" required>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    
    <button type="submit" class="btn btn-primary">Actualizar Producto</button>
</form>

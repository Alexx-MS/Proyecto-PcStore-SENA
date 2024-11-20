<head>
    <Style>
        /* General Styles */
body {
    font-family: 'Roboto', sans-serif;
    background-color: #1e1e2f; /* Fondo oscuro moderno */
    color: #f5f5f5; /* Texto claro para un buen contraste */
    margin: 0;
    padding: 20px;
}

h1 {
    text-align: center;
    color: #00c7ff; /* Azul eléctrico */
    font-size: 2.8em;
    margin-bottom: 30px;
}

/* Product Details */
div {
    margin: 15px 0;
    padding: 10px;
    font-size: 18px;
    background-color: #29293d; /* Fondo de caja para destacar detalles */
    border-left: 5px solid #00c7ff; /* Barra azul para énfasis */
    border-radius: 5px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
}

div strong {
    color: #ffcd38; /* Amarillo para destacar etiquetas */
    font-weight: bold;
}

/* Buttons */
.btn {
    display: inline-block;
    padding: 12px 18px;
    font-size: 14px;
    text-decoration: none;
    border: none;
    border-radius: 8px;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-top: 20px;
    color: #fff;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.3);
}

.btn-secondary {
    background-color: #4caf50; /* Verde para el botón de regresar */
}

.btn-secondary:hover {
    background-color: #388e3c;
}

/* Responsive Design */
@media (max-width: 768px) {
    div {
        font-size: 16px;
        padding: 8px;
    }

    h1 {
        font-size: 2em;
    }

    .btn {
        padding: 10px 14px;
        font-size: 12px;
    }
}

    </Style>
</head>

<h1>Product Details</h1>

<div><strong>Nombre:</strong> {{ $product->name }}</div>
<div><strong>Modelo:</strong> {{ $product->model }}</div>
<div><strong>Precio:</strong> {{ $product->price }}</div>
<div><strong>Disponbilidad:</strong> {{ $product->description }}</div>
<div><strong>Generacion:</strong> {{ $product->generation }}</div>
<div><strong>Fecha de Lanzamiento:</strong> {{ $product->release_date }}</div>
<div><strong>Disponbilidad:</strong> {{ $product->availability }}</div>
<div><strong>Ficha Tecnica:</strong> {{ $product->technical_specifications }}</div>
<div><strong>Marca:</strong> {{ $product->brand }}</div>

<a href="{{ route('products.index') }}" class="btn btn-secondary">Volver a la Lista</a>

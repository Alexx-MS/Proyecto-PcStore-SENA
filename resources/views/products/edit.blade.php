<h1>Edit Product</h1>

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
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
    </div>
    <!-- Los demás campos siguen el mismo patrón -->
    <!-- ... -->
    <button type="submit" class="btn btn-primary">Update Product</button>
</form>

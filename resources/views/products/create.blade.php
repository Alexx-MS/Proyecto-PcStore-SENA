<h1>Create New Product</h1>

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
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="model">Model</label>
        <input type="text" name="model" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" name="price" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label for="generation">Generation</label>
        <input type="text" name="generation" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="release_date">Release Date</label>
        <input type="date" name="release_date" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="availability">Availability</label>
        <input type="text" name="availability" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="technical_specifications">Technical Specifications</label>
        <textarea name="technical_specifications" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label for="brand">Brand</label>
        <input type="text" name="brand" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Create Product</button>
</form>

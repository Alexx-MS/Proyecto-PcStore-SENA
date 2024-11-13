<h1>Product Details</h1>

<div><strong>Name:</strong> {{ $product->name }}</div>
<div><strong>Model:</strong> {{ $product->model }}</div>
<div><strong>Price:</strong> {{ $product->price }}</div>
<div><strong>Description:</strong> {{ $product->description }}</div>
<div><strong>Generation:</strong> {{ $product->generation }}</div>
<div><strong>Release Date:</strong> {{ $product->release_date }}</div>
<div><strong>Availability:</strong> {{ $product->availability }}</div>
<div><strong>Technical Specifications:</strong> {{ $product->technical_specifications }}</div>
<div><strong>Brand:</strong> {{ $product->brand }}</div>

<a href="{{ route('products.index') }}" class="btn btn-secondary">Back to List</a>

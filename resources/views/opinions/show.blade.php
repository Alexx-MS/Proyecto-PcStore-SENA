<h1>Opinion Details</h1>

<div><strong>Product ID:</strong> {{ $opinion->product_id }}</div>
<div><strong>Rating:</strong> {{ $opinion->rating }}</div>
<div><strong>Comment:</strong> {{ $opinion->comment }}</div>
<div><strong>Date:</strong> {{ $opinion->date }}</div>
<div><strong>Usefulness:</strong> {{ $opinion->usefulness }}</div>

<a href="{{ route('opinions.index') }}" class="btn btn-secondary">Back to List</a>

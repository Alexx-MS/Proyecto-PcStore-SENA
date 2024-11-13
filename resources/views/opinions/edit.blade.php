<h1>Edit Opinion</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('opinions.update', $opinion) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="product_id">Product ID</label>
        <input type="number" name="product_id" class="form-control" value="{{ $opinion->product_id }}" required>
    </div>
    <div class="form-group">
        <label for="rating">Rating</label>
        <input type="number" name="rating" class="form-control" value="{{ $opinion->rating }}" min="1" max="5" required>
    </div>
    <div class="form-group">
        <label for="comment">Comment</label>
        <textarea name="comment" class="form-control" required>{{ $opinion->comment }}</textarea>
    </div>
    <div class="form-group">
        <label for="date">Date</label>
        <input type="date" name="date" class="form-control" value="{{ $opinion->date }}" required>
    </div>
    <div class="form-group">
        <label for="usefulness">Usefulness</label>
        <input type="number" name="usefulness" class="form-control" value="{{ $opinion->usefulness }}" min="0" required>
    </div>
    <button type="submit" class="btn btn-primary">Update Opinion</button>
</form>

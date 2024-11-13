
<h1>Create New Order</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('orders.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="quantity">Quantity</label>
        <input type="number" name="quantity" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="total_amount">Total Amount</label>
        <input type="number" name="total_amount" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <input type="text" name="status" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="date_time">Date Time</label>
        <input type="datetime-local" name="date_time" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea name="content" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" name="address" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="estimated_delivery_date">Estimated Delivery Date</label>
        <input type="date" name="estimated_delivery_date" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Create Order</button>
</form>


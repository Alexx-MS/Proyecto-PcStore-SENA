
<h1>Edit Order</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('orders.update', $order) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="quantity">Quantity</label>
        <input type="number" name="quantity" class="form-control" value="{{ $order->quantity }}" required>
    </div>
    <div class="form-group">
        <label for="total_amount">Total Amount</label>
        <input type="number" name="total_amount" class="form-control" value="{{ $order->total_amount }}" required>
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <input type="text" name="status" class="form-control" value="{{ $order->status }}" required>
    </div>
    <div class="form-group">
        <label for="date_time">Date Time</label>
        <input type="datetime-local" name="date_time" class="form-control" value="{{ $order->date_time }}" required>
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea name="content" class="form-control" required>{{ $order->content }}</textarea>
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" name="address" class="form-control" value="{{ $order->address }}" required>
    </div>
    <div class="form-group">
        <label for="estimated_delivery_date">Estimated Delivery Date</label>
        <input type="date" name="estimated_delivery_date" class="form-control" value="{{ $order->estimated_delivery_date }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update Order</button>
</form>

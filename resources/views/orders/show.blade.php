
<h1>Order Details</h1>

<div>
    <strong>ID:</strong> {{ $order->id }}
</div>
<div>
    <strong>Quantity:</strong> {{ $order->quantity }}
</div>
<div>
    <strong>Total Amount:</strong> {{ $order->total_amount }}
</div>
<div>
    <strong>Status:</strong> {{ $order->status }}
</div>
<div>
    <strong>Date Time:</strong> {{ $order->date_time }}
</div>
<div>
    <strong>Content:</strong> {{ $order->content }}
</div>
<div>
    <strong>Address:</strong> {{ $order->address }}
</div>
<div>
    <strong>Estimated Delivery Date:</strong> {{ $order->estimated_delivery_date }}
</div>

<a href="{{ route('orders.index') }}" class="btn btn-secondary">Back to List</a>

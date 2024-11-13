
<h1>Orders</h1>
<a href="{{ route('orders.create') }}" class="btn btn-primary">Create New Order</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Quantity</th>
            <th>Total Amount</th>
            <th>Status</th>
            <th>Date Time</th>
            <th>Estimated Delivery Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->total_amount }}</td>
                <td>{{ $order->status }}</td>
                <td>{{ $order->date_time }}</td>
                <td>{{ $order->estimated_delivery_date }}</td>
                <td>
                    <a href="{{ route('orders.show', $order) }}" class="btn btn-info">View</a>
                    <a href="{{ route('orders.edit', $order) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('orders.destroy', $order) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

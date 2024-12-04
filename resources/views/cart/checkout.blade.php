@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Resumen de Compra</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cartItems as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>${{ number_format($item->product->price, 2) }}</td>
                <td>${{ number_format($item->product->price * $item->quantity, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <h3>Total: ${{ number_format($total, 2) }}</h3>
    <a href="{{ route('payments.create', $orderId) }}" class="btn btn-primary">Proceder al Pago</a>
</div>
@endsection

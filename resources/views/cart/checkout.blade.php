@extends('layouts.app')

@section('content')
<head>
    <link rel="stylesheet" href="{{ asset('css/cart/checkout.css') }}">
</head>
<div class="container my-5">
    <h1 class="text-center mb-4">Resumen de Compra</h1>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-light">
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
    </div>
    <div class="d-flex justify-content-between align-items-center mt-4">
        <h3>Total: ${{ number_format($total, 2) }}</h3>
        <a href="{{ route('payments.create', $orderId) }}" class="btn btn-primary btn-lg">Proceder al Pago</a>
    </div>
</div>
@endsection

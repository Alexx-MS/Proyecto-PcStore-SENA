@extends('layouts.app')

@section('content')
    <h1>Checkout</h1>

    <form action="{{ route('payment.create', $order->id ?? 0) }}" method="GET">
        @csrf
        <div class="form-group">
            <label for="address">Dirección de envío</label>
            <input type="text" name="address" id="address" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Confirmar pedido</button>
    </form>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Pago</h2>

    <form action="{{ route('payments.create', ['orderId' => $orderId]) }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="payment_method">Método de pago</label>
            <select name="payment_method" id="payment_method" class="form-control" required>
                <option value="credit_card">Tarjeta de Crédito</option>
                <option value="paypal">PayPal</option>
                <option value="bank_transfer">Transferencia Bancaria</option>
                <option value="cash_on_delivery">Contra Entrega</option>
            </select>
        </div>

        <div class="form-group">
            <label for="billing_address">Dirección de facturación</label>
            <input type="text" name="billing_address" id="billing_address" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Confirmar pago</button>
    </form>
</div>
@endsection

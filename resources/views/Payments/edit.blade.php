<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pago</title>
</head>
<body>
    <h1>Editar Pago</h1>
    <form action="{{ route('payments.update', $payment) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="date_time">Fecha y Hora</label>
            <input type="datetime-local" id="date_time" name="date_time" value="{{ $payment->date_time }}" required>
        </div>

        <div>
            <label for="total_amount">Monto Total</label>
            <input type="number" id="total_amount" name="total_amount" value="{{ $payment->total_amount }}" required>
        </div>

        <div>
            <label for="payment_method">Método de Pago</label>
            <input type="text" id="payment_method" name="payment_method" value="{{ $payment->payment_method }}" required>
        </div>

        <div>
            <label for="authorization_number">Número de Autorización</label>
            <input type="text" id="authorization_number" name="authorization_number" value="{{ $payment->authorization_number }}" required>
        </div>

        <div>
            <label for="billing_address">Dirección de Facturación</label>
            <input type="text" id="billing_address" name="billing_address" value="{{ $payment->billing_address }}" required>
        </div>

        <div>
            <label for="transaction_number">Número de Transacción</label>
            <input type="text" id="transaction_number" name="transaction_number" value="{{ $payment->transaction_number }}" required>
        </div>

        <button type="submit">Actualizar Pago</button>
    </form>
</body>
</html>

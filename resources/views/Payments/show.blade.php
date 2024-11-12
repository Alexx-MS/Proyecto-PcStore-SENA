<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Pago</title>
</head>
<body>
    <h1>Detalles del Pago</h1>
    <p><strong>Fecha y Hora:</strong> {{ $payment->date_time }}</p>
    <p><strong>Monto Total:</strong> {{ $payment->total_amount }}</p>
    <p><strong>Método de Pago:</strong> {{ $payment->payment_method }}</p>
    <p><strong>Número de Autorización:</strong> {{ $payment->authorization_number }}</p>
    <p><strong>Dirección de Facturación:</strong> {{ $payment->billing_address }}</p>
    <p><strong>Número de Transacción:</strong> {{ $payment->transaction_number }}</p>

    <a href="{{ route('payments.index') }}">Volver a la lista</a>
</body>
</html>

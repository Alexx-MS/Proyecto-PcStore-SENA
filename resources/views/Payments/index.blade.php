<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pagos</title>
</head>
<body>
    <h1>Pagos</h1>
    <a href="{{ route('payments.create') }}">Nuevo Pago</a>
    <table>
        <thead>
            <tr>
                <th>Fecha y Hora</th>
                <th>Monto Total</th>
                <th>Método de Pago</th>
                <th>Número de Transacción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
                <tr>
                    <td>{{ $payment->date_time }}</td>
                    <td>{{ $payment->total_amount }}</td>
                    <td>{{ $payment->payment_method }}</td>
                    <td>{{ $payment->transaction_number }}</td>
                    <td>
                        <a href="{{ route('payments.show', $payment) }}">Ver</a>
                        <a href="{{ route('payments.edit', $payment) }}">Editar</a>
                        <form action="{{ route('payments.destroy', $payment) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

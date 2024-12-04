@extends('layouts.app')

@section('content')
<style>
    :root {
        --bg-dark: #121212;
        --bg-secondary: #1E1E1E;
        --text-primary: #FFFFFF;
        --text-secondary: #B0B0B0;
        --accent-red: #FF3B3B;
        --hover-red: #FF5252;
        --input-bg: #2C2C2C;
        --input-border: #3C3C3C;
    }

    body {
        background-color: var(--bg-dark);
        color: var(--text-primary);
        font-family: 'Arial', sans-serif;
        line-height: 1.6;
    }

    .payment-container {
        max-width: 500px;
        margin: 50px auto;
        background-color: var(--bg-secondary);
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.3);
        border: 1px solid rgba(255,59,59,0.2);
    }

    .payment-title {
        text-align: center;
        color: var(--accent-red);
        margin-bottom: 25px;
        font-size: 24px;
        font-weight: bold;
    }

    .payment-form {
        display: grid;
        gap: 20px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .form-label {
        color: var(--accent-red);
        font-weight: 600;
        transition: color 0.3s ease;
    }

    .form-control {
        background-color: var(--input-bg);
        color: var(--text-primary);
        border: 1px solid var(--input-border);
        border-radius: 8px;
        padding: 12px;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--accent-red);
        box-shadow: 0 0 0 3px rgba(255,59,59,0.2);
    }

    .form-control:hover {
        border-color: var(--hover-red);
    }

    .payment-submit {
        background-color: var(--accent-red);
        color: var(--text-primary);
        border: none;
        border-radius: 8px;
        padding: 12px 20px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 10px;
    }

    .payment-submit:hover {
        background-color: var(--hover-red);
        transform: scale(1.02);
        box-shadow: 0 5px 15px rgba(255,59,59,0.2);
    }

    /* Estilos para select */
    .form-control[name="payment_method"] {
        appearance: none;
        background-image: linear-gradient(45deg, transparent 50%, var(--accent-red) 50%), 
                          linear-gradient(135deg, var(--accent-red) 50%, transparent 50%);
        background-position: calc(100% - 20px) calc(1em + 2px), calc(100% - 15px) calc(1em + 2px);
        background-size: 5px 5px, 5px 5px;
        background-repeat: no-repeat;
    }

    .form-control[name="payment_method"]:focus {
        background-image: linear-gradient(45deg, transparent 50%, var(--hover-red) 50%), 
                          linear-gradient(135deg, var(--hover-red) 50%, transparent 50%);
    }
</style>

<div class="payment-container">
    <h2 class="payment-title">Realizar Pago</h2>

    <form action="{{ route('payments.create', ['orderId' => $orderId]) }}" method="POST" class="payment-form">
        @csrf

        <div class="form-group">
            <label for="payment_method" class="form-label">Método de pago</label>
            <select name="payment_method" id="payment_method" class="form-control" required>
                <option value="credit_card">Tarjeta de Crédito</option>
                <option value="paypal">PayPal</option>
                <option value="bank_transfer">Transferencia Bancaria</option>
                <option value="cash_on_delivery">Contra Entrega</option>
            </select>
        </div>

        <div class="form-group">
            <label for="billing_address" class="form-label">Dirección de facturación</label>
            <input type="text" name="billing_address" id="billing_address" class="form-control" required>
        </div>

        <button type="submit" class="payment-submit">Confirmar pago</button>
    </form>
</div>
@endsection
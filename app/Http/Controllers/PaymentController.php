<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // Método para mostrar la lista de pagos
    public function index()
    {
        $payments = Payment::all();
        return view('payments.index', compact('payments'));
    }

    // Método para mostrar el formulario de creación de pago
    public function create()
    {
        return view('payments.create');
    }

    // Método para almacenar un nuevo pago en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'date_time' => 'required|date',
            'total_amount' => 'required|numeric',
            'payment_method' => 'required|string|max:255',
            'authorization_number' => 'required|string|max:255',
            'billing_address' => 'required|string|max:255',
            'transaction_number' => 'required|string|max:255',
        ]);

        Payment::create($request->all());

        return redirect()->route('payments.index')->with('success', 'Pago creado exitosamente.');
    }

    // Método para mostrar los detalles de un pago específico
    public function show(Payment $payment)
    {
        return view('payments.show', compact('payment'));
    }

    // Método para mostrar el formulario de edición de un pago específico
    public function edit(Payment $payment)
    {
        return view('payments.edit', compact('payment'));
    }

    // Método para actualizar un pago en la base de datos
    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'date_time' => 'required|date',
            'total_amount' => 'required|numeric',
            'payment_method' => 'required|string|max:255',
            'authorization_number' => 'required|string|max:255',
            'billing_address' => 'required|string|max:255',
            'transaction_number' => 'required|string|max:255',
        ]);

        $payment->update($request->all());

        return redirect()->route('payments.index')
                         ->with('success', 'Pago actualizado exitosamente.');
    }

    // Método para eliminar un pago de la base de datos
    public function destroy(Payment $payment)
    {
        $payment->delete();

        return redirect()->route('payments.index')
                         ->with('success', 'Pago eliminado exitosamente.');
    }
}


<?php

namespace App\Http\Controllers;

use App\Models\Order;
use PayPal\Api\Payer;
use PayPal\Api\Amount;
use PayPal\Api\Payment;
use PayPal\Api\Transaction;
use PayPal\Rest\ApiContext;
use Illuminate\Http\Request;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentExecution;
use PayPal\Auth\OAuthTokenCredential;


class PaymentController extends Controller
{

    private $apiContext;

    public function __construct()
    {
        $paypalConfig = config('paypal');

        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                $paypalConfig['client_id'],
                $paypalConfig['client_secret']
            )
        );

        $this->apiContext->setConfig($paypalConfig['settings']);
    }

    // Método para mostrar la lista de pagos
    // public function index()
    // {
    //     $payments = Payment::all();
    //     return view('payments.index', compact('payments'));
    // }

    // // Método para mostrar el formulario de creación de pago
    // public function create()
    // {
    //     return view('payments.create');
    // }

    // // Método para almacenar un nuevo pago en la base de datos
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'date_time' => 'required|date',
    //         'total_amount' => 'required|numeric',
    //         'payment_method' => 'required|string|max:255',
    //         'authorization_number' => 'required|string|max:255',
    //         'billing_address' => 'required|string|max:255',
    //         'transaction_number' => 'required|string|max:255',
    //     ]);

    //     Payment::create($request->all());

    //     return redirect()->route('payments.index')->with('success', 'Pago creado exitosamente.');
    // }

    // // Método para mostrar los detalles de un pago específico
    // public function show(Payment $payment)
    // {
    //     return view('payments.show', compact('payment'));
    // }

    // // Método para mostrar el formulario de edición de un pago específico
    // public function edit(Payment $payment)
    // {
    //     return view('payments.edit', compact('payment'));
    // }

    // // Método para actualizar un pago en la base de datos
    // public function update(Request $request, Payment $payment)
    // {
    //     $request->validate([
    //         'date_time' => 'required|date',
    //         'total_amount' => 'required|numeric',
    //         'payment_method' => 'required|string|max:255',
    //         'authorization_number' => 'required|string|max:255',
    //         'billing_address' => 'required|string|max:255',
    //         'transaction_number' => 'required|string|max:255',
    //     ]);

    //     $payment->update($request->all());

    //     return redirect()->route('payments.index')
    //                      ->with('success', 'Pago actualizado exitosamente.');
    // }

    // // Método para eliminar un pago de la base de datos
    // public function destroy(Payment $payment)
    // {
    //     $payment->delete();

    //     return redirect()->route('payments.index')
    //                      ->with('success', 'Pago eliminado exitosamente.');
    // }

    public function createPayment(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);

        if ($order->status !== 'pendiente') {
            return redirect()->route('orders.history')->with('error', 'Este pedido no está en estado pendiente.');
        }

        // Crear el pago (Ejemplo con PayPal)
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        // Crear transacción
        $transaction = new Transaction();
        $transaction->setAmount(new Amount('USD', $order->total_amount));
        $transaction->setDescription('Pago por orden ' . $order->id);

        // URLs de redirección
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(route('payment.status'))
                     ->setCancelUrl(route('payment.cancel'));

        // Crear pago
        $payment = new Payment();
        $payment->setIntent('sale')
                ->setPayer($payer)
                ->setTransactions([$transaction])
                ->setRedirectUrls($redirectUrls);

        try {
            $payment->create($this->apiContext); // Crea el pago con la API de PayPal
            return redirect($payment->getApprovalLink()); // Redirige al usuario a PayPal
        } catch (\Exception $ex) {
            return redirect()->route('cart.show')->with('error', 'Hubo un error al crear el pago.');
        }
    }

    public function executePayment(Request $request)
    {
        $paymentId = $request->get('paymentId');
        $payerId = $request->get('PayerID');
        $payment = Payment::get($paymentId, $this->apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        try {
            $result = $payment->execute($execution, $this->apiContext); // Ejecuta el pago

            // Actualizar el pago en la base de datos
            $order = Order::findOrFail($payment->getTransactions()[0]->getCustom());
            $order->payment_status = 'completed';
            $order->save();

            // Actualizar detalles de la orden con el ID de pago
            foreach ($order->details as $detail) {
                $detail->update([
                    'payment_id' => $payment->getId(),
                ]);
            }

            return redirect()->route('orders.history')->with('success', 'Pago realizado con éxito.');
        } catch (\Exception $ex) {
            return redirect()->route('cart.show')->with('error', 'El pago no se pudo completar.');
        }
    }


}


<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use App\Models\Detail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Mostrar el carrito de compras (productos agregados)
    public function showCart()
    {
        $cartItems = session('cart', []);

        // Total del carrito
        $totalAmount = collect($cartItems)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        return view('cart.index', compact('cartItems', 'totalAmount'));
    }

    // Agregar un producto al carrito
    public function addToCart(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
        $cart = session('cart', []);

        // Verificar si el producto ya existe en el carrito
        if (isset($cart[$productId])) {
            // Aumentar la cantidad si ya está en el carrito
            $cart[$productId]['quantity'] += $request->quantity;
        } else {
            // Agregar el producto al carrito
            $cart[$productId] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $request->quantity,
            ];
        }

        session(['cart' => $cart]);

        return redirect()->route('cart.show');
    }

    // Eliminar un producto del carrito
    public function removeFromCart($productId)
    {
        $cart = session('cart', []);
        unset($cart[$productId]);

        session(['cart' => $cart]);

        return redirect()->route('cart.show');
    }

    // Procesar el pedido y redirigir a la página de pago
    public function checkout(Request $request)
    {
        $cartItems = session('cart', []);

        if (count($cartItems) === 0) {
            return redirect()->route('cart.show')->with('error', 'El carrito está vacío.');
        }

        // Crear una nueva orden
        $order = Order::create([
            'user_id' => Auth::id(),
            'quantity' => collect($cartItems)->sum('quantity'),
            'total_amount' => collect($cartItems)->sum(function ($item) {
                return $item['price'] * $item['quantity'];
            }),
            'status' => 'pendiente',
            'date_time' => now(),
            'content' => json_encode($cartItems),
            'address' => $request->address,
            'estimated_delivery_date' => now()->addDays(7), // Se puede ajustar a tu preferencia
        ]);

        // Guardar detalles de la orden
        foreach ($cartItems as $productId => $item) {
            Detail::create([
                'quantity' => $item['quantity'],
                'observations' => null, // Puedes permitir que el usuario agregue observaciones
                'order_id' => $order->id,
                'product_id' => $productId,
                'payment_id' => null, // Será asignado después de procesar el pago
            ]);
        }

        return redirect()->route('payments.create', ['orderId' => $order->id]);
    }

    // Crear un pago para la orden
    public function createPayment(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);

        if ($order->status !== 'pendiente') {
            return redirect()->route('orders.history')->with('error', 'Este pedido no está en estado pendiente.');
        }

        // Crear el pago
        $payment = Payment::create([
            'date_time' => now(),
            'total_amount' => $order->total_amount,
            'payment_method' => $request->payment_method,
            'authorization_number' => 'AUTH' . rand(1000, 9999), // Simulamos un número de autorización
            'billing_address' => $request->billing_address,
            'transaction_number' => 'TXN' . rand(1000, 9999), // Simulamos un número de transacción
        ]);

        // Actualizar los detalles de la orden con el ID de pago
        foreach ($order->details as $detail) {
            $detail->update([
                'payment_id' => $payment->id,
            ]);
        }

        // Actualizar el estado de la orden a 'pagado'
        $order->update([
            'status' => 'pagado',
        ]);

        return redirect()->route('orders.history')->with('success', 'El pago fue exitoso y la orden ha sido procesada.');
    }

        public function getCartCount()
    {
        $cart = session('cart', []);
        $cartCount = collect($cart)->sum('quantity'); // Suma todas las cantidades en el carrito

        return response()->json(['cartCount' => $cartCount]);
    }

}

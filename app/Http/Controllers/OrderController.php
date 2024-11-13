<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'quantity' => 'required|integer',
            'total_amount' => 'required|integer',
            'status' => 'required|string|max:255',
            'date_time' => 'required|date',
            'content' => 'required|string',
            'address' => 'required|string|max:255',
            'estimated_delivery_date' => 'required|date',
        ]);

        Order::create($request->all());

        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'quantity' => 'required|integer',
            'total_amount' => 'required|integer',
            'status' => 'required|string|max:255',
            'date_time' => 'required|date',
            'content' => 'required|string',
            'address' => 'required|string|max:255',
            'estimated_delivery_date' => 'required|date',
        ]);

        $order->update($request->all());

        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}

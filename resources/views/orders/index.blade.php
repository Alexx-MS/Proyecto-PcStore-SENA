@extends('layouts.app')

@section('title', 'Orders')

@section('content')
<div class="container mx-auto mt-5">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-4 text-gray-700">Orders</h1>

        <!-- Botón para crear nueva orden -->
        <div class="flex justify-end mb-4">
            <a href="{{ route('orders.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600 transition">
                Create New Order
            </a>
        </div>

        <!-- Mensaje de éxito -->
        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabla de órdenes -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr>
                        <th class="border-b py-2 px-4 text-gray-600">ID</th>
                        <th class="border-b py-2 px-4 text-gray-600">Quantity</th>
                        <th class="border-b py-2 px-4 text-gray-600">Total Amount</th>
                        <th class="border-b py-2 px-4 text-gray-600">Status</th>
                        <th class="border-b py-2 px-4 text-gray-600">Date Time</th>
                        <th class="border-b py-2 px-4 text-gray-600">Estimated Delivery Date</th>
                        <th class="border-b py-2 px-4 text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                        <tr class="hover:bg-gray-100">
                            <td class="py-2 px-4">{{ $order->id }}</td>
                            <td class="py-2 px-4">{{ $order->quantity }}</td>
                            <td class="py-2 px-4">${{ number_format($order->total_amount, 2) }}</td>
                            <td class="py-2 px-4">{{ ucfirst($order->status) }}</td>
                            <td class="py-2 px-4">{{ $order->date_time }}</td>
                            <td class="py-2 px-4">{{ $order->estimated_delivery_date }}</td>
                            <td class="py-2 px-4 flex items-center space-x-2">
                                <a href="{{ route('orders.show', $order) }}" class="text-blue-500 hover:underline">View</a>
                                <a href="{{ route('orders.edit', $order) }}" class="text-yellow-500 hover:underline">Edit</a>
                                <form action="{{ route('orders.destroy', $order) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-4 text-center text-gray-500">No orders found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

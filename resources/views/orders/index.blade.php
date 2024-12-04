@extends('layouts.app')

@section('title', 'Orders')

@section('content')
<div class="container mx-auto mt-5">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Orders</h1>

        <!-- Botón para crear nueva orden -->
        <div class="flex justify-end mb-4">
            <a href="{{ route('orders.create') }}" 
               class="bg-blue-500 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-600 transition">
                + Create New Order
            </a>
        </div>

        <!-- Mensaje de éxito -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabla de órdenes -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border-b py-3 px-6 text-gray-600 font-semibold">ID</th>
                        <th class="border-b py-3 px-6 text-gray-600 font-semibold">Quantity</th>
                        <th class="border-b py-3 px-6 text-gray-600 font-semibold">Total Amount</th>
                        <th class="border-b py-3 px-6 text-gray-600 font-semibold">Status</th>
                        <th class="border-b py-3 px-6 text-gray-600 font-semibold">Date Time</th>
                        <th class="border-b py-3 px-6 text-gray-600 font-semibold">Estimated Delivery</th>
                        <th class="border-b py-3 px-6 text-gray-600 font-semibold text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="py-3 px-6 text-gray-700">{{ $order->id }}</td>
                            <td class="py-3 px-6 text-gray-700">{{ $order->quantity }}</td>
                            <td class="py-3 px-6 text-gray-700">${{ number_format($order->total_amount, 2) }}</td>
                            <td class="py-3 px-6">
                                <span class="px-2 py-1 rounded-lg text-sm {{ $order->status === 'completed' ? 'bg-green-100 text-green-600' : 'bg-yellow-100 text-yellow-600' }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td class="py-3 px-6 text-gray-700">{{ $order->date_time }}</td>
                            <td class="py-3 px-6 text-gray-700">{{ $order->estimated_delivery_date }}</td>
                            <td class="py-3 px-6 flex justify-center space-x-4 text-gray-600">
                                <!-- Ver -->
                                <a href="{{ route('orders.show', $order) }}" class="hover:text-blue-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7s-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                                <!-- Editar -->
                                <a href="{{ route('orders.edit', $order) }}" class="hover:text-yellow-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17h2M12 12v7m0 0h-3m3 0h3m6 0a2 2 0 100-4h-2.5m-11 0H3a2 2 0 100 4h5.5m11 0a2 2 0 100-4h-2.5m0 0H3a2 2 0 100 4h5.5m-5.5 0a2 2 0 100-4h-5.5m0 0h5.5" />
                                    </svg>
                                </a>
                                <!-- Eliminar -->
                                <form action="{{ route('orders.destroy', $order) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="hover:text-red-500" onclick="return confirm('Are you sure?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-7 7-7-7" />
                                        </svg>
                                    </button>
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

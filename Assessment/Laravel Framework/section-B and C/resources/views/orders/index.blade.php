@extends('layouts.app')

@section('title', 'Order History')

@section('content')
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-sm">
        <h1 class="text-2xl font-bold mb-6">Order History</h1>

        @if($orders->isEmpty())
            <p class="text-gray-500">No orders placed yet.</p>
        @else
            <table class="min-w-full border border-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="border-b px-4 py-2 text-left">Order ID</th>
                        <th class="border-b px-4 py-2 text-left">Restaurant</th>
                        <th class="border-b px-4 py-2 text-left">Delivery Address</th>
                        <th class="border-b px-4 py-2 text-left">Total Amount</th>
                        <th class="border-b px-4 py-2 text-left">Status</th>
                        <th class="border-b px-4 py-2 text-left">Placed At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr class="hover:bg-gray-50">
                            <td class="border-b px-4 py-2">#{{ $order->id }}</td>
                            <td class="border-b px-4 py-2">{{ $order->restaurant->name }}</td>
                            <td class="border-b px-4 py-2">{{ $order->delivery_address }}</td>
                            <td class="border-b px-4 py-2">${{ number_format($order->total_amount, 2) }}</td>
                            <td class="border-b px-4 py-2">
                                @if($order->status === 'confirmed')
                                    <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded font-semibold">Confirmed</span>
                                @elseif($order->status === 'pending')
                                    <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded font-semibold">Pending</span>
                                @else
                                    <span class="bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded font-semibold">{{ ucfirst($order->status) }}</span>
                                @endif
                            </td>
                            <td class="border-b px-4 py-2 text-gray-500 text-sm">
                                {{ $order->created_at->format('M d, Y H:i') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection

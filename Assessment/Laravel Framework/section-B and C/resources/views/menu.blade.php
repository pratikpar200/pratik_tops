@extends('layouts.app')

@section('title', 'Restaurant Menu')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Restaurant Menu</h1>
    @foreach($restaurants as $restaurant)
        <div class="mb-10 bg-white p-6 rounded-lg shadow-sm">
            <h2 class="text-xl font-semibold mb-4 text-gray-800">{{ $restaurant->name }}</h2>
            <table class="min-w-full border border-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="border-b px-4 py-2 text-left">Item Name</th>
                        <th class="border-b px-4 py-2 text-left">Category</th>
                        <th class="border-b px-4 py-2 text-left">Price</th>
                        <th class="border-b px-4 py-2 text-left">Availability</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($restaurant->menuItems as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="border-b px-4 py-2">{{ $item->name }}</td>
                            <td class="border-b px-4 py-2">{{ $item->category }}</td>
                            <td class="border-b px-4 py-2">${{ number_format($item->price, 2) }}</td>
                            <td class="border-b px-4 py-2">
                                @if($item->is_available)
                                    <span class="text-green-600 font-semibold">Available</span>
                                @else
                                    <span class="text-red-600 font-semibold">Unavailable</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endforeach
@endsection

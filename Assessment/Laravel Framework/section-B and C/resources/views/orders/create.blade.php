@extends('layouts.app')

@section('title', 'Place Order')

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-sm">
        <h1 class="text-2xl font-bold mb-6">Place New Order</h1>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('orders.store') }}" method="POST">
            @csrf

            <!-- Restaurant Selection -->
            <div class="mb-4">
                <label for="restaurant_id" class="block font-semibold mb-2 text-gray-700">Select Restaurant</label>
                <select name="restaurant_id" id="restaurant_id" class="w-full p-2 border rounded-lg @error('restaurant_id') border-red-500 @enderror">
                    <option value="">-- Choose Restaurant --</option>
                    @foreach($restaurants as $restaurant)
                        <option value="{{ $restaurant->id }}" {{ old('restaurant_id') == $restaurant->id ? 'selected' : '' }}>
                            {{ $restaurant->name }}
                        </option>
                    @endforeach
                </select>
                @error('restaurant_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Delivery Address -->
            <div class="mb-4">
                <label for="delivery_address" class="block font-semibold mb-2 text-gray-700">Delivery Address</label>
                <textarea name="delivery_address" id="delivery_address" rows="3" class="w-full p-2 border rounded-lg @error('delivery_address') border-red-500 @enderror" placeholder="Enter delivery address (minimum 10 characters)">{{ old('delivery_address') }}</textarea>
                @error('delivery_address')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Total Amount -->
            <div class="mb-4">
                <label for="total_amount" class="block font-semibold mb-2 text-gray-700">Total Amount ($)</label>
                <input type="number" step="0.01" name="total_amount" id="total_amount" value="{{ old('total_amount') }}" class="w-full p-2 border rounded-lg @error('total_amount') border-red-500 @enderror" placeholder="0.00">
                @error('total_amount')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-600">
                Place Order
            </button>
        </form>
    </div>
@endsection

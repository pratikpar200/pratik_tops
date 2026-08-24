<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlaceOrderRequest;
use App\Models\Order;
use App\Models\Restaurant;
use App\Mail\OrderConfirmationMail;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Display the order history for the authenticated user.
     */
    public function index()
    {
        // Demonstrate Relationship 2 & 3: User hasMany Orders, and Order belongsTo Restaurant
        $orders = auth()->user()->orders()->with('restaurant')->latest()->get();

        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for placing a new order.
     */
    public function create()
    {
        $restaurants = Restaurant::all();
        return view('orders.create', compact('restaurants'));
    }

    /**
     * Store a newly created order in storage.
     */
    public function store(PlaceOrderRequest $request)
    {
        $validated = $request->validated();
        
        $validated['user_id'] = auth()->id();
        $validated['status'] = 'pending';

        // Persist order using Eloquent Order::create()
        $order = Order::create($validated);

        // Queue the order confirmation email
        Mail::to(auth()->user())->queue(new OrderConfirmationMail($order));

        // Update status from pending to confirmed
        $order->update(['status' => 'confirmed']);

        return redirect()->route('orders.index')->with('success', 'Order placed and confirmed successfully!');
    }
}

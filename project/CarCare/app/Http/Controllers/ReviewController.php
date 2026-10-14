<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Customer;
use App\Models\Booking;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        $search = $request->input('search');

        $reviews = Review::with(['customer', 'booking'])
        ->when($search, function ($query, $search) {
            return $query->where('rating', 'like', "%{$search}%")
                         ->orWhere('review', 'like', "%{$search}%")
                         ->orWhere('status', 'like', "%{$search}%")
                         ->orWhereHas('customer', function($q) use ($search) {
                             $q->where('name', 'like', "%{$search}%");
                         });
        })
        ->orderBy('id', 'desc')
        ->paginate(10)
        ->withQueryString();

        return view('admin.reviews', compact('reviews', 'search'));
    }

    public function create()
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        $customers = Customer::all();
        $bookings = Booking::all();
        return view('admin.add-review', compact('customers', 'bookings'));
    }

    public function store(Request $request)
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'booking_id' => 'required|exists:bookings,id',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string',
            'status' => 'required|string|in:Approved,Pending,Spam',
        ]);

        Review::create($validated);

        return redirect('/admin/reviews')->with('success', 'Review added successfully.');
    }

    public function edit($id)
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        $review = Review::findOrFail($id);
        $customers = Customer::all();
        $bookings = Booking::all();
        return view('admin.edit-review', compact('review', 'customers', 'bookings'));
    }

    public function update(Request $request, $id)
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        $review = Review::findOrFail($id);

        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'booking_id' => 'required|exists:bookings,id',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string',
            'status' => 'required|string|in:Approved,Pending,Spam',
        ]);

        $review->update($validated);

        return redirect('/admin/reviews')->with('success', 'Review updated successfully.');
    }

    public function destroy($id)
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        $review = Review::findOrFail($id);
        $review->delete();

        return redirect('/admin/reviews')->with('success', 'Review deleted successfully.');
    }
}
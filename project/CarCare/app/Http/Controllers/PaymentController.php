<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Booking;
use App\Models\Customer;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        $search = $request->input('search');

        $payments = Payment::with(['booking', 'customer'])
        ->when($search, function ($query, $search) {
            return $query->where('amount', 'like', "%{$search}%")
                         ->orWhere('payment_method', 'like', "%{$search}%")
                         ->orWhere('transaction_id', 'like', "%{$search}%")
                         ->orWhere('payment_status', 'like', "%{$search}%")
                         ->orWhereHas('customer', function($q) use ($search) {
                             $q->where('name', 'like', "%{$search}%");
                         });
        })
        ->orderBy('id', 'desc')
        ->paginate(10)
        ->withQueryString();

        return view('admin.payments', compact('payments', 'search'));
    }

    public function create()
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        $bookings = Booking::all();
        $customers = Customer::all();
        return view('admin.add-payment', compact('bookings', 'customers'));
    }

    public function store(Request $request)
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        $validated = $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'customer_id' => 'required|exists:customers,id',
            'amount' => 'required|numeric|min:0',
            'payment_method' => 'required|string|max:255',
            'transaction_id' => 'nullable|string|max:255',
            'payment_status' => 'required|string|max:255',
            'payment_date' => 'required|date',
        ]);

        Payment::create($validated);

        return redirect('/admin/payments')->with('success', 'Payment recorded successfully.');
    }

    public function edit($id)
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        $payment = Payment::findOrFail($id);
        $bookings = Booking::all();
        $customers = Customer::all();
        return view('admin.edit-payment', compact('payment', 'bookings', 'customers'));
    }

    public function update(Request $request, $id)
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        $payment = Payment::findOrFail($id);

        $validated = $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'customer_id' => 'required|exists:customers,id',
            'amount' => 'required|numeric|min:0',
            'payment_method' => 'required|string|max:255',
            'transaction_id' => 'nullable|string|max:255',
            'payment_status' => 'required|string|max:255',
            'payment_date' => 'required|date',
        ]);

        $payment->update($validated);

        return redirect('/admin/payments')->with('success', 'Payment updated successfully.');
    }

    public function destroy($id)
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        $payment = Payment::findOrFail($id);
        $payment->delete();

        return redirect('/admin/payments')->with('success', 'Payment record deleted successfully.');
    }
}
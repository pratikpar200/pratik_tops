<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use App\Mail\SignupWelcomeEmail;
use Illuminate\Support\Facades\Mail;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $customers = Customer::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('email', 'like', "%{$search}%")
                         ->orWhere('phone', 'like', "%{$search}%")
                         ->orWhere('address', 'like', "%{$search}%")
                         ->orWhere('status', 'like', "%{$search}%");
        })
        ->orderBy('id', 'desc')
        ->paginate(10)
        ->withQueryString();

        return view('admin.customers', compact('customers', 'search'));
    }

    public function create()
    {
        return view('admin.add-customer');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'required|string|max:255',
            'address' => 'required|string',
            'password' => 'required|string|min:6',
            'status' => 'required|string|in:Active,Inactive',
        ]);

        $validated['password'] = Hash::make($request->password);

        Customer::create($validated);

        return redirect('/admin/customers')->with('success', 'Customer created successfully.');
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('admin.edit-customer', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            'phone' => 'required|string|max:255',
            'address' => 'required|string',
            'password' => 'nullable|string|min:6',
            'status' => 'required|string|in:Active,Inactive',
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($request->password);
        } else {
            unset($validated['password']);
        }

        $customer->update($validated);

        return redirect('/admin/customers')->with('success', 'Customer updated successfully.');
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect('/admin/customers')->with('success', 'Customer deleted successfully.');
    }

 public function signup(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:customers,email',
        'phone' => 'required|string|max:255',
        'password' => 'required|string|min:6|confirmed',
    ]);

    $customer = Customer::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'phone' => $validated['phone'],
        'address' => '',
        'password' => Hash::make($validated['password']),
        'status' => 'Active',
    ]);

    // Send welcome email after successful signup
    Mail::to($customer->email)->send(
        new SignupWelcomeEmail(
            $customer->name,
            $customer->email
        )
    );

    return response()->json([
        'success' => true,
        'message' => 'Account created successfully! Welcome email sent.',
    ]);
}
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $customer = Customer::where('email', $request->email)->first();

        if (!$customer) {
            return response()->json([
                'success' => false,
                'message' => 'Email not found. Please check your email or sign up.',
            ], 422);
        }

        if (!Hash::check($request->password, $customer->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Incorrect password. Please try again.',
            ], 422);
        }

        if ($customer->status !== 'Active') {
            return response()->json([
                'success' => false,
                'message' => 'Your account is inactive. Please contact support.',
            ], 422);
        }

        $request->session()->put('customer_id', $customer->id);
        $request->session()->put('customer_name', $customer->name);

        return response()->json([
            'success' => true,
            'message' => 'Login successful! Redirecting...',
        ]);
    }

    public function logout(Request $request)
    {
        $request->session()->forget(['customer_id', 'customer_name']);
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('logout_success', 'Logout Successful');
    }

    /**
     * Show the logged-in customer's own profile page (Website).
     * Data is always read fresh from the customers table.
     */
    public function profile()
    {
        if (!session('customer_id')) {
            return redirect('/login')->with('error', 'Please login first.');
        }

        $customer = Customer::findOrFail(session('customer_id'));

        return view('website.profile', compact('customer'));
    }

    /**
     * Update the logged-in customer's own profile (Website).
     * Writes directly to the customers table via Eloquent update().
     */
    public function updateProfile(Request $request)
    {
        if (!session('customer_id')) {
            return redirect('/login')->with('error', 'Please login first.');
        }

        $customer = Customer::findOrFail(session('customer_id'));

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            'phone' => 'required|string|max:255',
            'address' => 'required|string',
            'password' => 'nullable|string|min:6',
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $customer->update($validated);
        $customer->refresh();

        session(['customer_name' => $customer->name]);

        return redirect('/profile')->with('success', 'Profile updated successfully.');
    }
}
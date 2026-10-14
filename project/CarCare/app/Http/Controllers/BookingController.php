<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Service;
use App\Models\Mechanic;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        $search = $request->input('search');

        $bookings = Booking::with(['customer', 'serviceRelation', 'mechanic'])
        ->when($search, function ($query, $search) {
            return $query->where('vehicle_name', 'like', "%{$search}%")
                         ->orWhere('vehicle_number', 'like', "%{$search}%")
                         ->orWhere('booking_status', 'like', "%{$search}%")
                         ->orWhere('payment_status', 'like', "%{$search}%")
                         ->orWhereHas('customer', function ($q) use ($search) {
                             $q->where('name', 'like', "%{$search}%")
                               ->orWhere('phone', 'like', "%{$search}%")
                               ->orWhere('email', 'like', "%{$search}%");
                         })
                         ->orWhereHas('serviceRelation', function ($q) use ($search) {
                             $q->where('service_name', 'like', "%{$search}%");
                         });
        })
        ->orderBy('booking_date', 'desc')
        ->paginate(10)
        ->withQueryString();

        return view('admin.bookings.index', compact('bookings', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        $customers = Customer::all();
        $services = Service::all();
        $mechanics = Mechanic::all();
        return view('admin.add-booking', compact('customers', 'services', 'mechanics'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Check if this is from website booking form (has customer_name)
        if ($request->has('customer_name')) {
            if (!session('customer_id')) {
                if ($request->wantsJson()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Please login first.',
                        'redirect' => '/login',
                    ], 401);
                }
                return redirect('/login')->with('error', 'Please login first.');
            }

            $validated = $request->validate([
                'customer_name' => 'required|string|max:255',
                'phone' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'vehicle_company' => 'required|string|max:255',
                'vehicle_model' => 'required|string|max:255',
                'vehicle_number' => 'nullable|string|max:255',
                'service' => 'required|string|max:255',
                'appointment_date' => 'required|date',
                'message' => 'nullable|string',
            ]);

            // Find or create customer
            $customer = Customer::firstOrCreate(
                ['email' => $validated['email']],
                [
                    'name' => $validated['customer_name'],
                    'phone' => $validated['phone'],
                    'address' => 'Web Booking Address',
                    'password' => bcrypt('password123'),
                    'status' => 'Active'
                ]
            );

            // Find or create service
            $serviceName = ucwords(str_replace('-', ' ', $validated['service']));
            $servicePrice = 49.00; // default foam wash price
            if ($validated['service'] === 'interior-detail') {
                $servicePrice = 129.00;
            } elseif ($validated['service'] === 'ceramic-coating') {
                $servicePrice = 499.00;
            } elseif ($validated['service'] === 'paint-correction') {
                $servicePrice = 299.00;
            }

            $service = Service::firstOrCreate(
                ['service_name' => $serviceName],
                [
                    'description' => $serviceName . ' description.',
                    'price' => $servicePrice,
                    'duration' => '60 Mins',
                    'status' => 'Active'
                ]
            );

            Booking::create([
                'customer_id' => $customer->id,
                'service_id' => $service->id,
                'mechanic_id' => null,
                'vehicle_name' => $validated['vehicle_company'] . ' ' . $validated['vehicle_model'],
                'vehicle_number' => $validated['vehicle_number'],
                'booking_date' => $validated['appointment_date'],
                'booking_time' => '10:00:00',
                'amount' => $service->price,
                'booking_status' => 'Pending',
                'payment_status' => 'Pending',
                'notes' => $validated['message']
            ]);

            if ($request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Booking Confirmed Successfully',
                    'redirect' => '/booking-history',
                ]);
            }

            return redirect('/booking-history')->with('success', 'Appointment Booked Successfully.');
        }

        // Admin Panel form submission
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'service_id' => 'required|exists:services,id',
            'mechanic_id' => 'nullable|exists:mechanics,id',
            'vehicle_name' => 'required|string|max:255',
            'vehicle_number' => 'nullable|string|max:255',
            'booking_date' => 'required|date',
            'booking_time' => 'required',
            'amount' => 'required|numeric|min:0',
            'booking_status' => 'required|string',
            'payment_status' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        Booking::create($validated);

        return redirect()->route('bookings.index')->with('success', 'Booking created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        $booking = Booking::with(['customer', 'serviceRelation', 'mechanic'])->findOrFail($id);
        return view('admin.bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        $booking = Booking::findOrFail($id);
        $customers = Customer::all();
        $services = Service::all();
        $mechanics = Mechanic::all();
        return view('admin.edit-booking', compact('booking', 'customers', 'services', 'mechanics'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        $booking = Booking::findOrFail($id);

        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'service_id' => 'required|exists:services,id',
            'mechanic_id' => 'nullable|exists:mechanics,id',
            'vehicle_name' => 'required|string|max:255',
            'vehicle_number' => 'nullable|string|max:255',
            'booking_date' => 'required|date',
            'booking_time' => 'required',
            'amount' => 'required|numeric|min:0',
            'booking_status' => 'required|string',
            'payment_status' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $booking->update($validated);

        return redirect()->route('bookings.index')->with('success', 'Booking updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('bookings.index')->with('success', 'Booking deleted successfully.');
    }
}
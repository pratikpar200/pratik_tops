<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Booking;
use App\Models\Service;
use App\Models\Mechanic;
use App\Models\Package;
use App\Models\Payment;
use App\Models\Review;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        $totalCustomers = Customer::count();
        $totalBookings = Booking::count();
        $totalServices = Service::count();
        $totalMechanics = Mechanic::count();
        $totalPackages = Package::count();
        $totalPayments = Payment::sum('amount');
        $totalReviews = Review::count();

        $recentBookings = Booking::with(['customer', 'serviceRelation'])
            ->orderBy('id', 'desc')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalCustomers',
            'totalBookings',
            'totalServices',
            'totalMechanics',
            'totalPackages',
            'totalPayments',
            'totalReviews',
            'recentBookings'
        ));
    }
}   
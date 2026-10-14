<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\MechanicController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminAuthController;

/*
|--------------------------------------------------------------------------
| Website Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('website.home');
});

Route::get('/about', function () {
    return view('website.about');
});

Route::get('/services', [ServiceController::class, 'website']);

Route::get('/service-details', function () {
    return view('website.service-details');
});

Route::get('/pricing', function () {
    return view('website.pricing');
});

Route::get('/packages', function () {
    return view('website.packages');
});

Route::get('/gallery', [GalleryController::class, 'website']);

Route::get('/testimonials', function () {
    return view('website.testimonials');
});

Route::get('/faq', function () {
    return view('website.faq');
});

Route::get('/blog', function () {
    return view('website.blog');
});

Route::get('/blog-details', function () {
    return view('website.blog-details');
});

Route::get('/contact', function () {
    return view('website.contact');
});

Route::post('/contact-store', [ContactController::class, 'store'])
    ->name('contact.store');

Route::get('/forgot-password', function () {
    return view('website.forgot-password');
});

Route::get('/track-booking', function () {
    return view('website.track-booking');
});

Route::get('/terms', function () {
    return view('website.terms');
});

Route::get('/privacy', function () {
    return view('website.privacy');
});

/*
|--------------------------------------------------------------------------
| Customer Guest Routes (web_before)
|--------------------------------------------------------------------------
*/
Route::middleware(['web_before'])->group(function () {
    Route::get('/login', function () {
        return view('website.login');
    });
    Route::post('/login', [CustomerController::class, 'login'])->name('login.store');

    Route::get('/signup', function () {
        return view('website.signup');
    });
    Route::post('/signup', [CustomerController::class, 'signup'])->name('signup.store');
});

/*
|--------------------------------------------------------------------------
| Customer Protected Routes (web_after)
|--------------------------------------------------------------------------
*/
Route::middleware(['web_after'])->group(function () {
    Route::get('/booking', function () {
        return view('website.booking');
    });
    Route::post('/booking', [BookingController::class, 'store'])
        ->name('booking.store');

    Route::get('/profile', [CustomerController::class, 'profile']);
    Route::put('/profile', [CustomerController::class, 'updateProfile'])->name('profile.update');

    Route::get('/my-bookings', function () {
        return view('website.my-bookings');
    });

    Route::get('/booking-history', function () {
        return view('website.booking-history');
    });

    Route::get('/invoice', function () {
        return view('website.invoice');
    });

    Route::get('/logout', [CustomerController::class, 'logout']);
});

/*
|--------------------------------------------------------------------------
| Admin Panel Routes
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Admin Guest Routes (admin_before)
|--------------------------------------------------------------------------
*/
Route::middleware(['admin_before'])->group(function () {
    Route::get('/admin/login', function () {
        return view('admin.login');
    });
    Route::post('/admin/login', [AdminAuthController::class, 'login']);
});

/*
|--------------------------------------------------------------------------
| Admin Protected Routes (admin_after)
|--------------------------------------------------------------------------
*/
Route::middleware(['admin_after'])->group(function () {
    Route::get('/admin', [App\Http\Controllers\DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);

    Route::get('/admin/logout', [AdminAuthController::class, 'logout']);

    Route::get('/admin/profile', [AdminProfileController::class, 'index']);
    Route::post('/admin/profile', [AdminProfileController::class, 'update']);

    Route::get('/admin/customers', [CustomerController::class, 'index']);
    Route::get('/admin/add-customer', [CustomerController::class, 'create']);
    Route::post('/admin/add-customer', [CustomerController::class, 'store']);
    Route::get('/admin/edit-customer/{id}', [CustomerController::class, 'edit']);
    Route::put('/admin/edit-customer/{id}', [CustomerController::class, 'update']);
    Route::delete('/admin/delete-customer/{id}', [CustomerController::class, 'destroy']);

    Route::resource('admin/bookings', BookingController::class);
    Route::get('/admin/add-booking', [BookingController::class, 'create']);
    Route::get('/admin/edit-booking/{id}', [BookingController::class, 'edit']);

    Route::get('/admin/services', [ServiceController::class, 'index']);
    Route::get('/admin/add-service', [ServiceController::class, 'create']);
    Route::post('/admin/add-service', [ServiceController::class, 'store']);
    Route::get('/admin/edit-service/{id}', [ServiceController::class, 'edit']);
    Route::put('/admin/edit-service/{id}', [ServiceController::class, 'update']);
    Route::delete('/admin/delete-service/{id}', [ServiceController::class, 'destroy']);

    Route::get('/admin/packages', [PackageController::class, 'index']);
    Route::get('/admin/add-package', [PackageController::class, 'create']);
    Route::post('/admin/add-package', [PackageController::class, 'store']);
    Route::get('/admin/edit-package/{id}', [PackageController::class, 'edit']);
    Route::put('/admin/edit-package/{id}', [PackageController::class, 'update']);
    Route::delete('/admin/delete-package/{id}', [PackageController::class, 'destroy']);

    Route::get('/admin/employees', function () {
        return view('admin.employees');
    });

    Route::get('/admin/add-employee', function () {
        return view('admin.add-employee');
    });

    Route::get('/admin/mechanics', [MechanicController::class, 'index']);
    Route::get('/admin/add-mechanic', [MechanicController::class, 'create']);
    Route::post('/admin/add-mechanic', [MechanicController::class, 'store']);
    Route::get('/admin/edit-mechanic/{id}', [MechanicController::class, 'edit']);
    Route::put('/admin/edit-mechanic/{id}', [MechanicController::class, 'update']);
    Route::delete('/admin/delete-mechanic/{id}', [MechanicController::class, 'destroy']);

    Route::get('/admin/gallery', [GalleryController::class, 'index']);
    Route::get('/admin/add-gallery', [GalleryController::class, 'create']);
    Route::post('/admin/add-gallery', [GalleryController::class, 'store']);
    Route::get('/admin/edit-gallery/{id}', [GalleryController::class, 'edit']);
    Route::put('/admin/edit-gallery/{id}', [GalleryController::class, 'update']);
    Route::delete('/admin/delete-gallery/{id}', [GalleryController::class, 'destroy']);

    Route::get('/admin/reviews', [ReviewController::class, 'index']);
    Route::get('/admin/add-review', [ReviewController::class, 'create']);
    Route::post('/admin/add-review', [ReviewController::class, 'store']);
    Route::get('/admin/edit-review/{id}', [ReviewController::class, 'edit']);
    Route::put('/admin/edit-review/{id}', [ReviewController::class, 'update']);
    Route::delete('/admin/delete-review/{id}', [ReviewController::class, 'destroy']);

    Route::get('/admin/invoices', function () {
        return view('admin.invoices');
    });

    Route::get('/admin/payments', [PaymentController::class, 'index']);
    Route::get('/admin/add-payment', [PaymentController::class, 'create']);
    Route::post('/admin/add-payment', [PaymentController::class, 'store']);
    Route::get('/admin/edit-payment/{id}', [PaymentController::class, 'edit']);
    Route::put('/admin/edit-payment/{id}', [PaymentController::class, 'update']);
    Route::delete('/admin/delete-payment/{id}', [PaymentController::class, 'destroy']);

    Route::get('/admin/reports', function () {
        return view('admin.reports');
    });

    Route::get('/admin/settings', [SettingController::class, 'index']);
    Route::put('/admin/settings', [SettingController::class, 'update']);

    Route::get('/admin/change-password', function () {
        return view('admin.change-password');
    });

    Route::get('/admin/notifications', function () {
        return view('admin.notifications');
    });

    Route::get('/admin/contact-messages', [ContactController::class, 'index']);
    Route::get('/admin/edit-contact-message/{id}', [ContactController::class, 'edit']);
    Route::delete('/admin/contact-messages/{id}', [ContactController::class, 'destroy']);

    Route::get('/admin/faq', function () {
        return view('admin.faq');
    });

    Route::get('/contact-messages', function () {
        return view('admin.contact-messages');
    });

});
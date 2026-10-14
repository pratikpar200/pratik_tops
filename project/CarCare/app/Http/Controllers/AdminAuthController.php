<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    /**
     * Handle Admin Login (session based)
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $admin = Admin::where('email', $request->email)->first();

        $passwordValid = false;

        if ($admin && !empty($admin->password) && Hash::isHashed($admin->password)) {
            $passwordValid = Hash::check($request->password, $admin->password);
        }

        if (!$admin || !$passwordValid) {
            return back()->with('error', 'Invalid Login Details');
        }

        $request->session()->put('admin_id', $admin->id);
        $request->session()->put('admin_name', $admin->name);

        return redirect('/admin/dashboard')->with('login_success', true);
    }

    /**
     * Handle Admin Logout (session based)
     */
    public function logout(Request $request)
    {
        $request->session()->forget(['admin_id', 'admin_name']);
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login')->with('logout_success', true);
    }
}
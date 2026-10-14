<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    /**
     * Show the currently logged-in admin's profile.
     */
    public function index()
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        $admin = Admin::findOrFail(session('admin_id'));

        return view('admin.profile', compact('admin'));
    }

    /**
     * Update the currently logged-in admin's profile.
     */
    public function update(Request $request)
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        $admin = Admin::findOrFail(session('admin_id'));

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . $admin->id,
            'password' => 'nullable|string|min:6',
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $admin->update($validated);

        // Keep session in sync so header/sidebar reflect the change immediately
        session(['admin_name' => $admin->name]);

        return redirect()->back()->with('success', 'Profile changes saved successfully.');
    }
}
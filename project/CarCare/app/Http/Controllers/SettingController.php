<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        $setting = Setting::firstOrCreate(['id' => 1], [
            'website_name' => 'CAR CARE',
            'phone' => '+1 (800) 555-CARCARE',
            'email' => 'info@carcare.com',
            'address' => '123 Auto Street, Auto City',
            'facebook' => 'https://facebook.com/carcare',
            'instagram' => 'https://instagram.com/carcare',
        ]);

        return view('admin.settings', compact('setting'));
    }

    public function update(Request $request)
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        $setting = Setting::firstOrCreate(['id' => 1]);

        $validated = $request->validate([
            'website_name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string',
            'facebook' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
        ]);

        if ($request->hasFile('logo')) {
            if ($setting->logo && file_exists(public_path($setting->logo))) {
                @unlink(public_path($setting->logo));
            }
            $logoName = time() . '_' . uniqid() . '.' . $request->logo->extension();
            $request->logo->move(public_path('uploads/settings'), $logoName);
            $validated['logo'] = 'uploads/settings/' . $logoName;
        }

        $setting->update($validated);

        return redirect()->back()->with('success', 'System configurations updated successfully.');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index(Request $request)
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        $search = $request->input('search');

        $packages = Package::when($search, function ($query, $search) {
            return $query->where('package_name', 'like', "%{$search}%")
                         ->orWhere('description', 'like', "%{$search}%")
                         ->orWhere('price', 'like', "%{$search}%")
                         ->orWhere('validity', 'like', "%{$search}%")
                         ->orWhere('status', 'like', "%{$search}%");
        })
        ->orderBy('id', 'desc')
        ->paginate(10)
        ->withQueryString();

        return view('admin.packages', compact('packages', 'search'));
    }

    public function create()
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        return view('admin.add-package');
    }

    public function store(Request $request)
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        $validated = $request->validate([
            'package_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'validity' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|string|in:Active,Inactive',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/packages'), $imageName);
            $validated['image'] = 'uploads/packages/' . $imageName;
        }

        Package::create($validated);

        return redirect('/admin/packages')->with('success', 'Package created successfully.');
    }

    public function edit($id)
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        $package = Package::findOrFail($id);
        return view('admin.edit-package', compact('package'));
    }

    public function update(Request $request, $id)
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        $package = Package::findOrFail($id);

        $validated = $request->validate([
            'package_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'validity' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|string|in:Active,Inactive',
        ]);

        if ($request->hasFile('image')) {
            if ($package->image && file_exists(public_path($package->image))) {
                @unlink(public_path($package->image));
            }
            $imageName = time() . '_' . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/packages'), $imageName);
            $validated['image'] = 'uploads/packages/' . $imageName;
        }

        $package->update($validated);

        return redirect('/admin/packages')->with('success', 'Package updated successfully.');
    }

    public function destroy($id)
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        $package = Package::findOrFail($id);
        if ($package->image && file_exists(public_path($package->image))) {
            @unlink(public_path($package->image));
        }
        $package->delete();

        return redirect('/admin/packages')->with('success', 'Package deleted successfully.');
    }
}
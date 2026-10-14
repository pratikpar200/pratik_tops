<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        $search = $request->input('search');

        $services = Service::when($search, function ($query, $search) {
            return $query->where('service_name', 'like', "%{$search}%")
                         ->orWhere('description', 'like', "%{$search}%")
                         ->orWhere('price', 'like', "%{$search}%")
                         ->orWhere('duration', 'like', "%{$search}%")
                         ->orWhere('status', 'like', "%{$search}%");
        })
        ->orderBy('id', 'desc')
        ->paginate(10)
        ->withQueryString();

        return view('admin.services', compact('services', 'search'));
    }

    public function create()
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        return view('admin.add-service');
    }

    public function store(Request $request)
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        $validated = $request->validate([
            'service_name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'status' => 'required|string|in:Active,Inactive',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/services'), $imageName);
            $validated['image'] = 'uploads/services/' . $imageName;
        }

        Service::create($validated);

        return redirect('/admin/services')->with('success', 'Service created successfully.');
    }

    public function edit($id)
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        $service = Service::findOrFail($id);
        return view('admin.edit-service', compact('service'));
    }

    public function update(Request $request, $id)
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        $service = Service::findOrFail($id);

        $validated = $request->validate([
            'service_name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'status' => 'required|string|in:Active,Inactive',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($service->image && file_exists(public_path($service->image))) {
                @unlink(public_path($service->image));
            }
            $imageName = time() . '_' . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/services'), $imageName);
            $validated['image'] = 'uploads/services/' . $imageName;
        }

        $service->update($validated);

        return redirect('/admin/services')->with('success', 'Service updated successfully.');
    }

    public function destroy($id)
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        $service = Service::findOrFail($id);
        if ($service->image && file_exists(public_path($service->image))) {
            @unlink(public_path($service->image));
        }
        $service->delete();

        return redirect('/admin/services')->with('success', 'Service deleted successfully.');
    }

    public function website()
{
    $services = Service::where('status', 'Active')
                ->orderBy('id', 'desc')
                ->get();

    return view('website.services', compact('services'));
}
}
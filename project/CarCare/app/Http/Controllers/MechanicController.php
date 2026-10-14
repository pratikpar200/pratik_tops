<?php

namespace App\Http\Controllers;

use App\Models\Mechanic;
use Illuminate\Http\Request;

class MechanicController extends Controller
{
    public function index(Request $request)
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        $search = $request->input('search');

        $mechanics = Mechanic::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('phone', 'like', "%{$search}%")
                         ->orWhere('email', 'like', "%{$search}%")
                         ->orWhere('specialization', 'like', "%{$search}%")
                         ->orWhere('experience', 'like', "%{$search}%")
                         ->orWhere('address', 'like', "%{$search}%")
                         ->orWhere('status', 'like', "%{$search}%");
        })
        ->orderBy('id', 'desc')
        ->paginate(10)
        ->withQueryString();

        return view('admin.mechanics', compact('mechanics', 'search'));
    }

    public function create()
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        return view('admin.add-mechanic');
    }

    public function store(Request $request)
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'specialization' => 'required|string|max:255',
            'experience' => 'required|string|max:255',
            'address' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|string|in:Active,Inactive',
        ]);

        if ($request->hasFile('photo')) {
            $imageName = time() . '_' . uniqid() . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads/mechanics'), $imageName);
            $validated['photo'] = 'uploads/mechanics/' . $imageName;
        }

        Mechanic::create($validated);

        return redirect('/admin/mechanics')->with('success', 'Mechanic created successfully.');
    }

    public function edit($id)
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        $mechanic = Mechanic::findOrFail($id);
        return view('admin.edit-mechanic', compact('mechanic'));
    }

    public function update(Request $request, $id)
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        $mechanic = Mechanic::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'specialization' => 'required|string|max:255',
            'experience' => 'required|string|max:255',
            'address' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|string|in:Active,Inactive',
        ]);

        if ($request->hasFile('photo')) {
            if ($mechanic->photo && file_exists(public_path($mechanic->photo))) {
                @unlink(public_path($mechanic->photo));
            }
            $imageName = time() . '_' . uniqid() . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads/mechanics'), $imageName);
            $validated['photo'] = 'uploads/mechanics/' . $imageName;
        }

        $mechanic->update($validated);

        return redirect('/admin/mechanics')->with('success', 'Mechanic updated successfully.');
    }

    public function destroy($id)
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        $mechanic = Mechanic::findOrFail($id);
        if ($mechanic->photo && file_exists(public_path($mechanic->photo))) {
            @unlink(public_path($mechanic->photo));
        }
        $mechanic->delete();

        return redirect('/admin/mechanics')->with('success', 'Mechanic deleted successfully.');
    }
}
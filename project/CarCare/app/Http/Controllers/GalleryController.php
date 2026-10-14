<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        $search = $request->input('search');

        $galleryItems = Gallery::when($search, function ($query, $search) {
            return $query->where('title', 'like', "%{$search}%");
        })
        ->orderBy('id', 'desc')
        ->paginate(12)
        ->withQueryString();

        return view('admin.gallery', compact('galleryItems', 'search'));
    }

    public function create()
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        return view('admin.add-gallery');
    }

    public function store(Request $request)
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/gallery'), $imageName);
            $validated['image'] = 'uploads/gallery/' . $imageName;
        }

        Gallery::create($validated);

        return redirect('/admin/gallery')->with('success', 'Gallery item added successfully.');
    }

    public function edit($id)
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        $gallery = Gallery::findOrFail($id);
        return view('admin.edit-gallery', compact('gallery'));
    }

    public function update(Request $request, $id)
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        $gallery = Gallery::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($gallery->image && file_exists(public_path($gallery->image))) {
                @unlink(public_path($gallery->image));
            }
            $imageName = time() . '_' . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/gallery'), $imageName);
            $validated['image'] = 'uploads/gallery/' . $imageName;
        }

        $gallery->update($validated);

        return redirect('/admin/gallery')->with('success', 'Gallery item updated successfully.');
    }

    public function destroy($id)
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        $gallery = Gallery::findOrFail($id);
        if ($gallery->image && file_exists(public_path($gallery->image))) {
            @unlink(public_path($gallery->image));
        }
        $gallery->delete();

        return redirect('/admin/gallery')->with('success', 'Gallery item deleted successfully.');
    }

    /**
     * Display gallery items on the public Website Gallery page.
     */
    public function website()
    {
        $galleryItems = Gallery::orderBy('id', 'desc')->get();

        return view('website.gallery', compact('galleryItems'));
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\FoodItem;
use Illuminate\Http\Request;

class FoodItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(FoodItem::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0.01',
            'category' => 'required|string',
            'is_available' => 'boolean',
        ]);

        $foodItem = FoodItem::create($validated);

        return response()->json($foodItem, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $foodItem = FoodItem::findOrFail($id);
        $foodItem->delete();

        return response()->json([
            'message' => 'Food item deleted successfully.'
        ], 200);
    }
}

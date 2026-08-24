<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display the public menu page showing restaurants and their menu items.
     */
    public function index()
    {
        // Demonstrate Relationship 1: Restaurant hasMany MenuItems
        $restaurants = Restaurant::with('menuItems')->get();

        return view('menu', compact('restaurants'));
    }
}

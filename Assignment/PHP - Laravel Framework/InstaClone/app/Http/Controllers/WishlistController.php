<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function add($id)
    {
        return "Item #{$id} added to your wishlist.";
    }

    public function remove($id)
    {
        return "Item #{$id} removed from your wishlist.";
    }
}
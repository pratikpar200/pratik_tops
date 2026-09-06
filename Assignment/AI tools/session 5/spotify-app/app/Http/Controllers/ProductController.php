<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    private static $products = [
        1 => ["id" => 1, "name" => "Samsung Mobile", "price" => 15000],
        2 => ["id" => 2, "name" => "Nike Shoes", "price" => 3000],
    ];

    // create a new Flipkart-style product
    public function create(Request $request)
    {
        $id = count(self::$products) + 1;
        $product = [
            "id" => $id,
            "name" => $request->input('name'),
            "price" => $request->input('price')
        ];
        self::$products[$id] = $product;

        return response()->json([
            'status' => 'success',
            'message' => 'Product created',
            'product' => $product
        ], 201);
    }

    // read/display all products
    public function read()
    {
        return response()->json([
            'status' => 'success',
            'products' => self::$products
        ], 200);
    }

    // update an existing product by id
    public function update(Request $request, $id)
    {
        if (!isset(self::$products[$id])) {
            return response()->json([
                'status' => 'error',
                'message' => 'Product not found'
            ], 404);
        }

        self::$products[$id]['name'] = $request->input('name');
        self::$products[$id]['price'] = $request->input('price');

        return response()->json([
            'status' => 'success',
            'message' => 'Product updated',
            'product' => self::$products[$id]
        ], 200);
    }

    // delete a product by id
    public function delete($id)
    {
        if (!isset(self::$products[$id])) {
            return response()->json([
                'status' => 'error',
                'message' => 'Product not found'
            ], 404);
        }

        unset(self::$products[$id]);

        return response()->json([
            'status' => 'success',
            'message' => 'Product deleted'
        ], 200);
    }
}
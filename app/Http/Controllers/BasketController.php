<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BasketController extends Controller
{
    // Add a product id to the basket session
    public function add(Request $request)
    {
        // Check if product_id is provided        
        if (!$request->has("product_id")) {
            return response()->json(["message" => "Product ID is required"], 400);
        }

        // Check if basket session exists, if not create an empty array
        if (!session()->has("basket")) {
            session()->put("basket", []);
        }

        // Check if product_id is already in the basket, if so add 1 to the quantity, otherwise add it with quantity 1
        $basket = session()->get("basket");
        $productId = $request->input("product_id");
        if (isset($basket[$productId])) {
            $basket[$productId]["quantity"] += 1;
        } else {
            $basket[$productId] = ["quantity" => 1];
        }
        session()->put("basket", $basket);
    }

    // Remove a product id from the basket session
    public function remove(Request $request)
    {
        // Check if product_id is provided        
        if (!$request->has("product_id")) {
            return response()->json(["message" => "Product ID is required"], 400);
        }

        // Check if basket session exists
        if (!session()->has("basket")) {
            return response()->json(["message" => "Basket is empty"], 400);
        }

        // Remove the product from the basket
        $basket = session()->get("basket");
        $productId = $request->input("product_id");
        if (isset($basket[$productId])) {
            unset($basket[$productId]);
            session()->put("basket", $basket);
        }
    }

    public function api_get()
    {
        $basket = session()->get("basket", []);
        return response()->json($basket);
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Pcntl\QosClass;

class BasketController extends Controller
{
    // Add a product id to the basket session
    public function add(Request $request)
    {
        // Check if product_id is provided        
        if (!$request->has("product_id")) {
            return response()->json(["message" => "Product ID is required"], 400);
        }

        $basket = session()->get("basket", []); // default to empty array

        // Check if product_id is valid
        $productId = $request->input("product_id");
        if (!Product::where("id", "=", $productId, false)->exists()) {
            return response()->json(["error" => "Invalid product"], 404);
        }        

        // Check if product_id is already in the basket, if so add 1 to the quantity, otherwise add it with quantity 1
        if (isset($basket[$productId])) {
            $basket[$productId]["quantity"]++;
        } else {
            $basket[$productId]["quantity"] = 1;
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
        // Get product ID's from session
        $productIds = array_keys(session()->get("basket", []));

        // Get products from database using the product ID's and only return the id, name, price and image fields
        $products = Product::whereIn("id", $productIds, false, false)->get();

        // Add quantity field to each product based on the session data
        $basket = session()->get("basket", []);
        foreach ($products as $product) {
            $product->quantity = $basket[$product->id]["quantity"] ?? 0;
        }
        return response()->json($products);
    }
}
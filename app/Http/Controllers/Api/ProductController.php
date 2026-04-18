<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json(Product::all());    
        //return Product::all();
    }

    public function show($id)
    {
        return response()->json(Product::findOrFail($id));
    }

    public function insert(Request $request)
    {
        $data = $request->validate([
            "name" => "required|string|max:255",
            "description_short" => "required|string|max:255",
            "description_long" => "required|string",
            "price" => "required|numeric",
            "image" => "nullable|string|max:255",
        ]);
        
        $product = Product::create($data);

        return response()->json($product, 201);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $data = $request->validate([
            'name' => 'sometimes|string|max:255',
            'description_short' => 'sometimes|string|max:255',
            'description_long' => 'sometimes|string',
            'price' => 'sometimes|numeric',
            'image' => 'nullable|string|max:255',
        ]);

        $product->update($data);

        return response()->json($product);
    }

    public function delete($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->delete();
        return response()->json(['message' => 'Product deleted']);
    }

}

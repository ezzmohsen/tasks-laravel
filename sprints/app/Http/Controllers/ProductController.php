<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    // Store a new product
    public function store(Request $request)
    {
        // Validate the request
        $productAdded = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'stock' => 'boolean',
            'unit_price' => 'required|numeric|min:0',
        ]);


        Product::create($productAdded);

        // Redirect with success message
        return redirect()->route('products.create')->with('success', 'Product added successfully!');
    }

    public function show(Product $product)
    {
        return view('products', compact('product'));
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products')->with('success', 'Product deleted successfully.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    // Update an existing product
    public function update(Request $request, $id)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'boolean',
            'unit_price' => 'required|numeric|min:0',
        ]);

        // Find the product
        $product = Product::findOrFail($id);

        // Update the product
        $product->update($validated);

        // Redirect with success message
        return redirect()->route('products.edit', $id)->with('success', 'Product updated successfully!');
    }
}


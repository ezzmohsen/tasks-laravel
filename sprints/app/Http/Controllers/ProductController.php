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

   
    public function store(Request $request)
    {

        $productAdded = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',

            'stock' => 'boolean',
            'unit_price' => 'required|numeric|min:0',
        ]);

     
        Product::create($productAdded);

    
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

    public function edit(Product $product)
    {
        return view('products', compact('product'));
    }
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|max:10|string',
            'description' => 'required|min:5|string',
            'unite price' => 'required|numeric',
            'stock' => 'required|boolean',
        ]);

        $product->update($request->all());

        return redirect()->route('products')->with('success', 'Product updated successfully.');
    }
}


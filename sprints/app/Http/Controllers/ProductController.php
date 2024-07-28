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
        return view('products');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:10|string',
            'description' => 'required|min:5|string',
            'unite price' => $request->input('unit price', 0.00),
            'stock' => 'required|boolean',
        ]);
        Product::create($request->all());
        return redirect()->route('products')->with('success', 'Product created successfully.');


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


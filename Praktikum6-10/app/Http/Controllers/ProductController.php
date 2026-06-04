<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|integer|min:0',
            'description' => 'required|string',
        ]);

        Product::create($attributes);

        return redirect()->route('products.index')
                         ->with('success', 'Produk berhasil ditambahkan!');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $attributes = $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|integer|min:0',
            'description' => 'required|string',
        ]);

        $product->update($attributes);

        return redirect()->route('products.index')
                         ->with('success', 'Produk berhasil diubah!');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
                         ->with('success', 'Produk berhasil dihapus!');
    }

    // public function index()
    // {
    //     $products = [
    //         'Laptop',
    //         'Mouse',
    //         'Keyboard'
    //     ];

    //     return view('products.index', compact('products'));
    // }
}
<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('product', [
            'title' => 'Master Product',
            'products' => Product::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('productCreate', [
            'title' => 'Add New Product',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'harga_modal' => 'required|max:255',
            'harga_jual' => 'required|max:255',
            'quantity' => 'required|max:255',
            'uom' => 'required',
            'vendor' => 'required|max:255',
        ]);

        Product::create($validatedData);
        return redirect('/product')->with('success', 'New Product has been added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('productUpdate', [
            'title' => 'Update Product',
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'harga_modal' => 'required|max:255',
            'harga_jual' => 'required|max:255',
            'quantity' => 'required|max:255',
            'uom' => 'required',
            'vendor' => 'required|max:255',
        ]);

        Product::where('id', $product->id)->update($validatedData);
        return redirect('/product')->with('success', 'New Product has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Product::destroy($product->id);
        return redirect('/product')->with('success', 'Product Deleted Successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class productController extends Controller
{

    // Show the form for adding a new product
    public function create()
    {
        return view('add-product');
    }

    // Store the newly created product
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'details' => 'nullable|string',
            'publish' => 'required|in:yes,no',
        ]);

        // Create the product
        Products::create([
            'name' => $request->name,
            'price' => $request->price,
            'details' => $request->details,
            'publish' => $request->publish,
        ]);

        // Redirect to the products list with a success message
        return redirect('/')->with('success', 'Product added successfully!');
    }
    // public function addProduct(Request $request)
    // {
    //     $incomingFields = $request->validate(
    //         [
    //             'name' => 'required',
    //             'price' => ['required', 'numeric'],
    //             'details' => ['required', 'string'],
    //             'publish' => ['string', 'in:yes,no'],
    //         ]
    //     );
    //     $incomingFields['name'] = strip_tags($incomingFields['name']);
    //     $incomingFields['price'] = strip_tags($incomingFields['price']);
    //     $incomingFields['details'] = strip_tags($incomingFields['details']);
    //     $incomingFields['published'] = strip_tags($incomingFields['publish']);
    //     products::create($incomingFields);

    //     return redirect('/');
    // }
    public function showProduct($id)
    {
        $product = Products::findOrFail($id); // Retrieve product or show 404 if not found
        return view('product-details', ['product' => $product]);
    }


    public function showEditScreen($id)
    {
        $product = Products::findOrFail($id);
        return view('edit-product', ['product' => $product]);
    }
    public function actuallyUpdateProduct(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'details' => 'required|string|max:500',
            'price' => 'required|numeric',
            'publish' => 'required|in:yes,no',
        ]);

        $product = Products::findOrFail($id);
        $product->update([
            'name' => $request->input('name'),
            'details' => $request->input('details'),
            'price' => $request->input('price'),
            'publish' => $request->input('publish'),
        ]);

        return redirect('/')->with('success', 'Product updated successfully!');
    }

    public function deleteProduct(Products $id)
    {
        $id->delete();
        return redirect('/')->with('success', 'Product deleted successfully!');
    }
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        // If search parameter exists, filter products
        $products = Products::when($search, function($query) use ($search) {
            return $query->where('name', 'LIKE', "%{$search}%")
                        ->orWhere('details', 'LIKE', "%{$search}%")
                        ->orWhere('price', 'LIKE', "%{$search}%");
        })
        ->get();
        
        return view('/home', compact('products'));
    }
}

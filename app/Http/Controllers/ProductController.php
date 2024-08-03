<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Products;
use App\Models\Seller;
use App\Models\Reservation;


class ProductController extends Controller
{
    public function index(){
        $products = Products::all();
        return view('products.index',['products' => $products]);
    }

    public function create(Seller $seller){
        return view('products.create', ['seller' => $seller]);
    }

    public function store(Request $request){

        $authenticatedUser = Auth::user();
        $seller = $authenticatedUser->seller;

        $data = $request->validate([
            'product_name' => 'required',
            'product_description' => 'required',
            'qty' => 'required|numeric', 'float',
            'price' => 'required|numeric','float',
        ]);

        $data['seller_id'] = $seller->user_id;

        $newProduct = Products::create($data);

        return redirect(route('dashboard'));
    }

    public function edit(Products $product){
        return view('products.edit', ['product' => $product]);
    }

    public function update(Products $product, Request $request){

        $data = $request->validate([
            'product_name' => 'required',
            'product_description' => 'required',
            'qty' => 'required|numeric', 'float',
            'price' => 'required|numeric','float'
        ]);

        $product ->update($data);

        return redirect(route('dashboard'))->with('success', 'Product updated successfully.');
    }

    public function delete(Products $product)
    {
        $product ->delete();
        return redirect(route('dashboard'))->with('success', 'Product deleted successfully.');
    }

    public function reserve(Products $product)
    {
        return view('products.reserve',['product' => $product]);
    }

    public function save(Products $product, Request $request)
    {
        $data = $request -> validate([
            'quantity' => 'required|numeric',
            'pickup_date' => 'required|date',
            'notes' => 'sometimes|nullable'
        ]);

        $authUser = Auth::user();
        $data['product_id'] = $product->id;
        $data['seller_id'] = $product ->seller_id;
        $data['customer_id'] = $authUser ->id;
        $data['notes'] = $data['notes'] ?? 'none';

        $newReservation = Reservation::create($data);
        
        return redirect(route('dashboard'));
    }
}

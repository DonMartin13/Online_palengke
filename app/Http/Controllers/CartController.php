<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Products;

class CartController extends Controller
{
    public function add(Request $request)
    {
        // Add product to cart logic
    }

    public function index()
    {
        $cartItems = Products::all();
        return view('cart.index', compact('cartItems'));
    }

    public function update(Request $request)
    {
        // Update cart item quantity logic
    }

    public function delete(Request $request)
    {
        // Delete cart item logic
    }

    public function reserve(Request $request)
    {
        // Reserve cart item logic
    }

    public function cancelReservation(Request $request)
    {
        // Cancel reservation logic
    }
}
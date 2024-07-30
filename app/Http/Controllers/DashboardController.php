<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Seller;
use App\Models\Products;

class DashboardController extends Controller
{
    public function index(){
        $authenticateduser = Auth::user();
        if($authenticateduser->user_type == "Customer"){
            return view('users.customer');

        }else if($authenticateduser->user_type == "Seller"){
           $seller = $authenticateduser->seller;
           $seller_id = $seller -> user_id;

           $products = Products::where('seller_id', $seller_id)->get();
            return view('users.seller', compact('seller', 'products'));
        }
    }
}

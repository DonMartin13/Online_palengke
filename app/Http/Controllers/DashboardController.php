<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Seller;
use App\Models\Products;
use App\Models\Reservation;

class DashboardController extends Controller
{
    public function index(){
        $authenticateduser = Auth::user();
        $authID = $authenticateduser ->id;
        $reservations = Reservation::where('customer_id',$authID) -> with('product')->get();

        if($authenticateduser->user_type == "Customer"){
            if($reservations ->isNotEmpty())
            {
                return view('users.customer', compact('reservations'));
            }else{
                return view('users.customer');
            }
            
        }else if($authenticateduser->user_type == "Seller"){
           $seller = $authenticateduser->seller;
           $seller_id = $seller -> user_id;

           $products = Products::where('seller_id', $seller_id)->get();
           if($reservations->isNotEmpty())
           {
            return view('users.seller', compact('seller', 'products', 'reservations'));
           }else{
            return view('users.seller', compact('seller', 'products'));
           }
            
        }
    }
}

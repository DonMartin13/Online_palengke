<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable =[
        'product_id',
        'seller_id',
        'customer_id',
        'pickup_date',
        'notes'
    ];
}

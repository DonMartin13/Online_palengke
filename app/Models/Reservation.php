<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservation';

    protected $fillable =[
        'product_id',
        'seller_id',
        'customer_id',
        'quantity',
        'pickup_date',
        'notes'
    ];

    public function product(){
        return $this->belongsTo(Products::class, 'product_id');
    }
}

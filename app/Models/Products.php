<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'seller_id',
        'product_name',
        'product_description',
        'qty',
        'price'
    ];

    public function seller(){
        return $this->belongsTo(Seller::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $table = 'seller';

    protected $fillable = [
        'user_id',
        'name',
        'market_location'
    ];

    public function user()
    {
        return $this->belongsTo(User::Class);
    }

    public function product()
    {
        return $this->hasOne(Product::class);
    }
}

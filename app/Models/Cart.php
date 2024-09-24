<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'user_id',
    //     'products'
    // ];
    protected $guarded = [];

    // Decode the JSON products field
    public function getProductsAttribute($value)
    {
        return json_decode($value, true);
    }

    // Encode products to store in the database
    public function setProductsAttribute($value)
    {
        $this->attributes['products'] = json_encode($value);
    }

    public function cartCount() {
        $cart = Cart::where('created_by', $userId)->first();
        $cartProducts = $cart ? $cart->products : [];
        return $cartProducts;
    }
}

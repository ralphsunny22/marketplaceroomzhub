<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\CentralLogics\Helpers;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['product_qty_in_cart'];

    public function createdBy() {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getProductQtyInCartAttribute() {
        //cartProduct
        $cartProduct = Helpers::cartProduct($this->id); //{"name":"Annie Shoe","quantity":8,"price":1000,"featured_image":"2024-09-14-66e582b673b00.png"}
        $cartProductQty = $cartProduct ?  $cartProduct['quantity'] : 1;
        return $cartProductQty;
    }
}

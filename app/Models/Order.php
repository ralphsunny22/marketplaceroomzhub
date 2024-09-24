<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function createdBy() {
        return $this->belongsTo(User::class, 'created_by');
    }

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

}

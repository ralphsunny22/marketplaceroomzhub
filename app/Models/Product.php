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

    // Accessor to return the full path of each image in featured_image
    public function getFeaturedImageAttribute($value)
    {
        $image = $value ? $value : null;

        if ($image) {
            return asset('/storage/products/' . $image);
        }
        return null;
    }

    // Accessor to return the full path of each image in alternate_images
    public function getAlternateImagesAttribute($value)
    {
        $images = $value ? json_decode($value, true) : null;

        if (is_array($images)) {
            return array_map(function ($image) {
                // return Storage::url('tasks/' . $image); // Return the full storage URL
                return asset('/storage/products/' . $image);
            }, $images);
        }

        return [];
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function createdBy() {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getProductQtyInCartAttribute() {
        //cartProduct
        $cartProduct = Helpers::cartProduct($this->id); //{"name":"Annie Shoe","quantity":8,"price":1000,"featured_image":"2024-09-14-66e582b673b00.png"}
        $cartProductQty = $cartProduct ?  $cartProduct['quantity'] : 1;
        return $cartProductQty;
    }

    public function vendor()
    {
        return $this->hasOneThrough(
            Vendor::class,
            User::class,
            'id', // Foreign key on the User table
            'user_id', // Foreign key on the Vendor table
            'created_by', // Local key on the Product table
            'id' // Local key on the User table
        );
    }

    public function getBgColor($status) {

        $allStatus = [
            ['name'=>'pending', 'bgColor'=>'primary'],
            ['name'=>'featured', 'bgColor'=>'success'],
        ];

        foreach ($allStatus as $statusItem) {
            if ($statusItem['name'] === $status) {
                return $statusItem['bgColor'];
            }
        }
        return null; // Return null or a default value if the status is not found
    }


}

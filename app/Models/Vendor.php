<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    public function getFeaturedLogoAttribute($value)
    {
        $image = $value ? $value : null;

        if ($image) {
            return asset('/storage/vendors/' . $image);
        }
        return null;
    }

    public function getFeaturedImageAttribute($value)
    {
        $image = $value ? $value : null;

        if ($image) {
            return asset('/storage/vendors/' . $image);
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
                return asset('/storage/vendors/' . $image);
            }, $images);
        }

        return [];
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function orders() {
        return $this->hasMany(Order::class, 'vendor_id');
    }

    public function products() {
        return $this->hasMany(Product::class, 'created_by');
    }

    public function getBgColor($status) {

        $allStatus = [
            ['name'=>'confirmed', 'bgColor'=>'success'],
            ['name'=>'pending', 'bgColor'=>'primary'],
            ['name'=>'suspended', 'bgColor'=>'danger'],
        ];

        foreach ($allStatus as $statusItem) {
            if ($statusItem['name'] === $status) {
                return $statusItem['bgColor'];
            }
        }
        return null; // Return null or a default value if the status is not found
    }
}

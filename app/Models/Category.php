<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function getFeaturedLogoAttribute($value)
    {
        $image = $value ? $value : null;

        if ($image) {
            return asset('/storage/categories/' . $image);
        }
        return null;
    }
}

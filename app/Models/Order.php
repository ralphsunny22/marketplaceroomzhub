<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];
    // protected $appends = ['vendor'];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    //customer
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

    public function customer() {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function vendorUser()
    {
        return $this->belongsTo(User::class, 'vendor_id');
    }

    public function vendor()
    {
        return $this->hasOneThrough(
            Vendor::class,
            User::class,
            'id', // Foreign key on the User table
            'user_id', // Foreign key on the Vendor table
            'vendor_id', // Local key on the Order table
            'id' // Local key on the User table
        );
    }


    public function getBgColor($status) {

        $allStatus = [
            ['name'=>'delivered', 'bgColor'=>'success'],
            ['name'=>'in progress', 'bgColor'=>'primary'],
            ['name'=>'pending', 'bgColor'=>'secondary'],
            ['name'=>'cancelled', 'bgColor'=>'dark'],

        ];

        foreach ($allStatus as $statusItem) {
            if ($statusItem['name'] === $status) {
                return $statusItem['bgColor'];
            }
        }
        return null; // Return null or a default value if the status is not found
    }

    public function getCustomerBgColor($status) {

        $allStatus = [
            ['name'=>'active', 'bgColor'=>'success'],
            ['name'=>'inactive', 'bgColor'=>'danger'],
        ];

        foreach ($allStatus as $statusItem) {
            if ($statusItem['name'] === $status) {
                return $statusItem['bgColor'];
            }
        }
        return null; // Return null or a default value if the status is not found
    }

}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Vendor;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $vendor = new Vendor();

            $vendor->business_name = 'Demo Business Name';
            $vendor->slug = Str::slug('Demo Business Name');
            $vendor->user_id = 2;
            $vendor->business_link = 'Demo Business Link';

            $vendor->business_city = 'Demo Business City';
            $vendor->business_state = 'Demo Business State';
            $vendor->business_country = 'Demo Business Country';
            $vendor->business_address = 'Demo Business Address';
            $vendor->category_id = 1;

            $vendor->business_description = 'Demo Business Description';

            // Handle the main image upload
            $featured_logo = 'noimage.png';
            $featured_image = 'noimage.png';
            $vendor->alternate_images = null;

            $vendor->save();
    }
}

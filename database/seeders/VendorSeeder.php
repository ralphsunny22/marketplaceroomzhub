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

            ////////////////////////

            $vendor = new Vendor();

            $vendor->business_name = 'Demo2 Business Name';
            $vendor->slug = Str::slug('Demo2 Business Name');
            $vendor->user_id = 2;
            $vendor->business_link = 'Demo2 Business Link';

            $vendor->business_city = 'Demo2 Business City';
            $vendor->business_state = 'Demo2 Business State';
            $vendor->business_country = 'Demo2 Business Country';
            $vendor->business_address = 'Demo2 Business Address';
            $vendor->category_id = 1;

            $vendor->business_description = 'Demo2 Business Description';

            // Handle the main image upload
            $featured_logo = 'noimage.png';
            $featured_image = 'noimage.png';
            $vendor->alternate_images = null;

            $vendor->save();

            ////////////////////////////

            $vendor = new Vendor();

            $vendor->business_name = 'Demo3 Business Name';
            $vendor->slug = Str::slug('Demo3 Business Name');
            $vendor->user_id = 2;
            $vendor->business_link = 'Demo3 Business Link';

            $vendor->business_city = 'Demo3 Business City';
            $vendor->business_state = 'Demo3 Business State';
            $vendor->business_country = 'Demo3 Business Country';
            $vendor->business_address = 'Demo3 Business Address';
            $vendor->category_id = 1;

            $vendor->business_description = 'Demo3 Business Description';

            // Handle the main image upload
            $featured_logo = 'noimage.png';
            $featured_image = 'noimage.png';
            $vendor->alternate_images = null;

            $vendor->save();

            ////////////////////////////////

            $vendor = new Vendor();

            $vendor->business_name = 'Demo4 Business Name';
            $vendor->slug = Str::slug('Demo4 Business Name');
            $vendor->user_id = 2;
            $vendor->business_link = 'Demo4 Business Link';

            $vendor->business_city = 'Demo4 Business City';
            $vendor->business_state = 'Demo4 Business State';
            $vendor->business_country = 'Demo4 Business Country';
            $vendor->business_address = 'Demo4 Business Address';
            $vendor->category_id = 1;

            $vendor->business_description = 'Demo4 Business Description';

            // Handle the main image upload
            $featured_logo = 'noimage.png';
            $featured_image = 'noimage.png';
            $vendor->alternate_images = null;

            $vendor->save();
    }
}

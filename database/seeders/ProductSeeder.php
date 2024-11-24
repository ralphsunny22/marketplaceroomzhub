<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Product;

class ProductSeeder extends Seeder
{

    public function run(): void
    {
        $specifications = ['Advanced system for better experience', 'Industry-leading durability features with Ceramic Shield and water resistance5',
        'Lorem ipsum dolor, sit amet consectetur adipisicing elit', 'At nulla labore molestiae repudiandae itaque exercitationem tempora', 'culpa cumque nesciunt soluta magnam deserunt minus vel',
        'aspernatur ipsam expedita debitis quod iste'];

        $product = new Product();
        $product->name = 'Product 1';
        $product->created_by = 2;
        $product->slug = Str::slug('Product 1');
        $product->uuid = (string) Str::uuid();
        $product->category_id = 1;
        $product->price = 100;
        $product->quantity = 1000;
        $product->featured_image = 'noimage.png';
        $product->description = 'A very nice multipurpose product';
        // $product->alternate_images = json_encode(['noimage.png']);
        $product->specifications = json_encode($specifications);
        $product->status = 'active';
        $product->save();

        $product = new Product();
        $product->name = 'Product 2';
        $product->created_by = 2;
        $product->slug = Str::slug('Product 2');
        $product->uuid = (string) Str::uuid();
        $product->category_id = 1;
        $product->price = 100;
        $product->quantity = 1000;
        $product->featured_image = 'noimage.png';
        $product->description = 'A very nice multipurpose product';
        // $product->alternate_images = json_encode(['noimage.png']);
        $product->specifications = json_encode($specifications);
        $product->status = 'active';
        $product->save();

        $product = new Product();
        $product->name = 'Product 3';
        $product->created_by = 2;
        $product->slug = Str::slug('Product 3');
        $product->uuid = (string) Str::uuid();
        $product->category_id = 1;
        $product->price = 100;
        $product->quantity = 1000;
        $product->featured_image = 'noimage.png';
        $product->description = 'A very nice multipurpose product';
        // $product->alternate_images = json_encode(['noimage.png']);
        $product->specifications = json_encode($specifications);
        $product->status = 'active';
        $product->save();

        $product = new Product();
        $product->name = 'Product 4';
        $product->created_by = 2;
        $product->slug = Str::slug('Product 4');
        $product->uuid = (string) Str::uuid();
        $product->category_id = 1;
        $product->price = 100;
        $product->quantity = 1000;
        $product->featured_image = 'noimage.png';
        $product->description = 'A very nice multipurpose product';
        // $product->alternate_images = json_encode(['noimage.png']);
        $product->specifications = json_encode($specifications);
        $product->status = 'active';
        $product->save();

        $product = new Product();
        $product->name = 'Product 5';
        $product->created_by = 2;
        $product->slug = Str::slug('Product 5');
        $product->uuid = (string) Str::uuid();
        $product->category_id = 1;
        $product->price = 100;
        $product->quantity = 1000;
        $product->featured_image = 'noimage.png';
        $product->description = 'A very nice multipurpose product';
        // $product->alternate_images = json_encode(['noimage.png']);
        $product->specifications = json_encode($specifications);
        $product->status = 'active';
        $product->save();

        $product = new Product();
        $product->name = 'Product 6';
        $product->created_by = 2;
        $product->slug = Str::slug('Product 6');
        $product->uuid = (string) Str::uuid();
        $product->category_id = 1;
        $product->price = 100;
        $product->quantity = 1000;
        $product->featured_image = 'noimage.png';
        $product->description = 'A very nice multipurpose product';
        // $product->alternate_images = json_encode(['noimage.png']);
        $product->specifications = json_encode($specifications);
        $product->status = 'active';
        $product->save();

        $product = new Product();
        $product->name = 'Product 7';
        $product->created_by = 2;
        $product->slug = Str::slug('Product 5');
        $product->uuid = (string) Str::uuid();
        $product->category_id = 1;
        $product->price = 100;
        $product->quantity = 1000;
        $product->featured_image = 'noimage.png';
        $product->description = 'A very nice multipurpose product';
        // $product->alternate_images = json_encode(['noimage.png']);
        $product->specifications = json_encode($specifications);
        $product->status = 'active';
        $product->save();

        $product = new Product();
        $product->name = 'Product 8';
        $product->created_by = 2;
        $product->slug = Str::slug('Product 6');
        $product->uuid = (string) Str::uuid();
        $product->category_id = 1;
        $product->price = 100;
        $product->quantity = 1000;
        $product->featured_image = 'noimage.png';
        $product->description = 'A very nice multipurpose product';
        // $product->alternate_images = json_encode(['noimage.png']);
        $product->specifications = json_encode($specifications);
        $product->status = 'active';
        $product->save();
    }
}

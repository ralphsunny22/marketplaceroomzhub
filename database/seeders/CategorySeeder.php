<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = new Category();
        $category->name = 'Fashion';
        $category->created_by = 1;
        $category->slug = Str::slug('Fashion');
        $category->uuid = (string) Str::uuid();
        $category->featured_logo = 'noimage.png';
        $category->save();

        $category = new Category();
        $category->name = 'Electronics';
        $category->created_by = 1;
        $category->slug = Str::slug('Electronics');
        $category->uuid = (string) Str::uuid();
        $category->featured_logo = 'noimage.png';
        $category->save();

        $category = new Category();
        $category->name = 'Health';
        $category->created_by = 1;
        $category->slug = Str::slug('Health');
        $category->uuid = (string) Str::uuid();
        $category->featured_logo = 'noimage.png';
        $category->save();

        $category = new Category();
        $category->name = 'Furniture';
        $category->created_by = 1;
        $category->slug = Str::slug('Furniture');
        $category->uuid = (string) Str::uuid();
        $category->featured_logo = 'noimage.png';
        $category->save();

        $category = new Category();
        $category->name = 'General';
        $category->created_by = 1;
        $category->slug = Str::slug('General');
        $category->uuid = (string) Str::uuid();
        $category->featured_logo = 'noimage.png';
        $category->save();
    }
}

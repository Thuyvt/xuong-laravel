<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductGallery;
use App\Models\ProductSize;
use App\Models\ProductVariant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        ProductVariant::query()->truncate();
        ProductGallery::query()->truncate();
        Product::query()->truncate();
        ProductSize::query()->truncate();
        ProductColor::query()->truncate();

        // S, M, L, XL, XXL
        foreach (['S', 'M', 'L', 'XL', 'XXL'] as $item) {
            ProductSize::query()->create([
                'name' => $item
            ]);
        }
        foreach (['black', 'blue', 'yellow', 'red', 'white'] as $item) {
            ProductColor::query()->create([
                'name' => $item
            ]);
        }
        for ($i = 0; $i < 50; $i++) {
            $name = fake()->text(50);
            Product::query()->create([
                'category_id'=>rand(2, 7),
//                'name'=> fake()->text('product demo'),
                'name'=> $name,
                'slug' => Str::slug($name) . '-' . Str::random(8),
                'sku' => Str::random(8) . $i,
                'img_thumbnail' => 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-1.webp',
                'price_regular' => 600000,
                'price_sale' => 499000,
            ]);
        }

//        Tạo product gallery
        for ($i = 1; $i < 51; $i++) {
            ProductGallery::query()->insert([
                [
                    'product_id' => $i,
                    'image' => 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-1.webp',
                ],
                [
                    'product_id' => $i,
                    'image' => 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp',
                ],
            ]);
        }

    }
}

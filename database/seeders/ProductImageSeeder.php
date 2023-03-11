<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductImage;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productImages = [
            [
                'product_id' => 1,
                'path' => '/images/item1_11032023.jpg',
            ],
            [
                'product_id' => 2,
                'path' => '/images/item2_11032023.jpg',
            ],
            [
                'product_id' => 3,
                'path' => '/images/item3_11032023.jpg',
            ],
            [
                'product_id' => 4,
                'path' => '/images/item4_11032023.jpg',
            ],
            [
                'product_id' => 5,
                'path' => '/images/item5_11032023.jpg',
            ],
        ];

        foreach ($productImages as $image)
        {
            ProductImage::create($image);
        }
    }
}

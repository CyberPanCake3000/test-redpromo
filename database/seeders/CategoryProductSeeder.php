<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CategoryProduct;


class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryProduct = [
            [
                'category_id' => 1,
                'product_id' => 1,
            ],
            [
                'category_id' => 2,
                'product_id' => 1,
            ],
            [
                'category_id' => 3,
                'product_id' => 1,
            ],
            [
                'category_id' => 4,
                'product_id' => 1,
            ],
            [
                'category_id' => 3,
                'product_id' => 2,
            ],
            [
                'category_id' => 4,
                'product_id' => 2,
            ],
            [
                'category_id' => 2,
                'product_id' => 3,
            ],
            [
                'category_id' => 2,
                'product_id' => 4,
            ],
            [
                'category_id' => 4,
                'product_id' => 4,
            ],
            [
                'category_id' => 2,
                'product_id' => 5,
            ],
        ];

        foreach ($categoryProduct as $record)
        {
            CategoryProduct::create($record);
        }
    }
}

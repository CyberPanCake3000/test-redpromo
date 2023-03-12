<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'лягушковый переворачиватель',
                'description' => 'Хорошая вещь. Переворачивает',
                'price' => 9383.87,
                'quantity' => 800,
            ],
            [
                'name' => 'Собаковый гладитель',
                'description' => 'Если вашей собачке не хватает внимания эта штука будет ее гладить',
                'price' => 56.20,
                'quantity' => 82,
            ],
            [
                'name' => 'Самая полезная вещь в вашем доме',
                'description' => 'Не спрашивайте зачем она вам, просто купите',
                'price' => 4.20,
                'quantity' => 69,
            ],
            [
                'name' => 'лежатель',
                'description' => 'полежит за вас на диванчике',
                'price' => 285.02,
                'quantity' => 300,
            ],
            [
                'name' => 'сон',
                'description' => 'купи, пусть он хоть где-то будет',
                'price' => 74639.02,
                'quantity' => 100,
            ],
        ];

        foreach ($products as $product){
            Product::create($product);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'жэб',
                'description' => 'категория только для различного вида жэбов',
            ],
            [
                'name' => 'штуки для дома',
                'description' => 'штуки для дома собственно',
            ],
            [
                'name' => 'для животных',
                'description' => 'чтобы ваш питомец был довольный',
            ],
            [
                'name' => 'девайсы',
                'description' => 'штуки',
            ],
        ];

        foreach($categories as $category)
        {
            Category::create($category);
        }
    }
}

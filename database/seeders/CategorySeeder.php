<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Soda'],
            ['name' => 'Milk'],
            ['name' => 'Tea'],
            ['name' => 'Juice'],
            ['name' => 'Energy'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}

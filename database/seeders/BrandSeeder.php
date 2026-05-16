<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $brands = [
            ['name' => 'Cocacola'],
            ['name' => 'Number1'],
            ['name' => 'Pepsico'],
            ['name' => 'Fanta'],
            ['name' => 'Nutri'],
        ];

        foreach ($brands as $brand) {
            Brand::create($brand);
        }
    }
}

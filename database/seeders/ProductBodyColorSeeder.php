<?php

namespace Database\Seeders;

use App\Models\ProductBodyColor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductBodyColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductBodyColor::factory()->count(3)->create();
    }
}

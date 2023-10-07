<?php

namespace Database\Seeders;

use App\Models\ProductWheelTrim;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductWheelTrimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductWheelTrim::factory()->count(2)->create();
    }
}

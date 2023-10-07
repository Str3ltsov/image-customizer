<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductWheelTrim>
 */
class ProductWheelTrimFactory extends Factory
{
    private static int $counter = 0;

    private array $names = [
        '17 inches 5 Y-spokes, black, diamond cut',
        '18 inches 5 compound spokes, black, diamond cut'
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $wheelTrim = [
            'name' => $this->names[self::$counter],
            'is_default' => self::$counter === 0 ? true : false,
            'product_id' => 1
        ];

        self::$counter += 1;

        return $wheelTrim;
    }
}

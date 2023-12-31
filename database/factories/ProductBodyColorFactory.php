<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductBodyColor>
 */
class ProductBodyColorFactory extends Factory
{
    private static int $counter = 0;

    private array $names = [
        'Red',
        'Black',
        'White'
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $bodyColor = [
            'name' => $this->names[self::$counter],
            'is_default' => self::$counter === 0 ? true : false,
            'product_id' => 1
        ];

        self::$counter += 1;

        return $bodyColor;
    }
}

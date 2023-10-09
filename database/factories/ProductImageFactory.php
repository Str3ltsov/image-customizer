<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductImage>
 */
class ProductImageFactory extends Factory
{
    private static int $bodyColorCounter = 1;
    private static int $wheelTrimCounter = 1;
    private static int $imageCounter = 0;

    private array $srcs = [
        1 => [
            'assets/volvo_s60/red_17inch.jpg',
            'assets/volvo_s60/red_18inch.jpg'
        ],
        2 => [
            'assets/volvo_s60/black_17inch.jpg',
            'assets/volvo_s60/black_18inch.jpg'
        ],
        3 => [
            'assets/volvo_s60/white_17inch.jpg',
            'assets/volvo_s60/white_18inch.jpg',
        ]
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $image = [
            'src' => $this->srcs[self::$bodyColorCounter][self::$imageCounter],
            'product_body_color_id' => self::$bodyColorCounter,
            'product_wheel_trim_id' => self::$wheelTrimCounter
        ];

        // Increment image counter by one
        self::$imageCounter += 1;

        // Reset image counter to zero and increment body color counter by one
        if (self::$imageCounter === 2) {
            self::$imageCounter = 0;
            self::$bodyColorCounter += 1;
        }

        // Increment and decrement wheel trim counter back and forth by one
        self::$wheelTrimCounter == 1 ? self::$wheelTrimCounter += 1 : self::$wheelTrimCounter -= 1;

        return $image;
    }
}

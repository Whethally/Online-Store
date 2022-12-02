<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Market>
 */
class MarketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    const IMAGES = [
        // '16182445.jpg',
        // '36954616.jpg',
        // '1973057206.jpg',
        // '939494685.jpg',
        // '1233480958.jpg',
        // '1275125481.jpg',
        // '1890993891.jpg',
        'harddrive.jpg',
        'videocard.jpg',
        'motherboard.jpg',
        'processor.jpg',
        'ram.jpg',
        'power.jpg',
        'frame.jpg',
    ];

    const NAMES = [
        'RX 580',
        'RX 570',
        'RX 560',
        'RTX 2080',
        'RTX 2070',
        'RTX 2060',
        'Ryzen 5 3600',
        'Ryzen 7 3700X',
        'Ryzen 9 3900X',
        'GiGabyte B450M',
        'Asus B450M',
        'MSI B450M',
        'Corsair Vengeance 16GB',
        'Corsair Vengeance 32GB',
        'Corsair Vengeance 64GB',
        'WD Blue 1TB',
        'WD Blue 2TB',
        'WD Blue 4TB',
        'Corsair CX550',
    ];

    public function definition()
    {
        return [
            'name' => self::NAMES[fake()->numberBetween(0, 18)],
            'description' => fake()->text(),
            'amount' => fake()->numberBetween(1, 10),
            'user_id' => fake()->numberBetween(1, 10),
            'category_id' => fake()->numberBetween(1, 7),
            'price' => fake()->numberBetween(1000, 100000),
            'image' => self::IMAGES[fake()->numberBetween(0, 6)],
        ];
    }
}

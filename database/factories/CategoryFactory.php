<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    const CATEGORIES = [
        'Видеокарта',
        'Процессор',
        'Материнская плата',
        'Оперативная память',
        'Жесткий диск',
        'Блок питания',
        'Корпус',
    ];

    public function definition()
    {
        return [
            'name' => self::CATEGORIES,
        ];
    }
}

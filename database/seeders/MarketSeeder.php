<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Market::create([
            'name' => 'RX 580',
            'image' => 'videocard.jpg',
            'price' => 10000,
            'description' => 'Видеокарта AMD Radeon RX 580 8GB GDDR5',
            'category_id' => 1,
            'user_id' => fake()->numberBetween(1, 10),
            'active' => 1,
            'amount' => fake()->numberBetween(1, 10),
        ]);

        \App\Models\Market::create([
            'name' => 'RX 570',
            'image' => 'videocard.jpg',
            'price' => 8000,
            'description' => 'Видеокарта AMD Radeon RX 570 8GB GDDR5',
            'category_id' => 1,
            'user_id' => fake()->numberBetween(1, 10),
            'active' => 1,
            'amount' => fake()->numberBetween(1, 10),
        ]);

        \App\Models\Market::create([
            'name' => 'RX 560',
            'image' => 'videocard.jpg',
            'price' => 6000,
            'description' => 'Видеокарта AMD Radeon RX 560 8GB GDDR5',
            'category_id' => 1,
            'user_id' => fake()->numberBetween(1, 10),
            'active' => 1,
            'amount' => fake()->numberBetween(1, 10),
        ]);

        // processor

        \App\Models\Market::create([
            'name' => 'AMD Ryzen 5 3600',
            'image' => 'processor.jpg',
            'price' => 15000,
            'description' => 'Процессор AMD Ryzen 5 3600',
            'category_id' => 2,
            'user_id' => fake()->numberBetween(1, 10),
            'active' => 1,
            'amount' => fake()->numberBetween(1, 10),
        ]);

        \App\Models\Market::create([
            'name' => 'AMD Ryzen 5 3600',
            'image' => 'processor.jpg',
            'price' => 15000,
            'description' => 'Процессор AMD Ryzen 5 3600',
            'category_id' => 2,
            'user_id' => fake()->numberBetween(1, 10),
            'active' => 1,
            'amount' => fake()->numberBetween(1, 10),
        ]);

        \App\Models\Market::create([
            'name' => 'AMD Ryzen 5 3600',
            'image' => 'processor.jpg',
            'price' => 15000,
            'description' => 'Процессор AMD Ryzen 5 3600',
            'category_id' => 2,
            'user_id' => fake()->numberBetween(1, 10),
            'active' => 1,
            'amount' => fake()->numberBetween(1, 10),
        ]);

        // motherboard 

        \App\Models\Market::create([
            'name' => 'MSI B450M PRO-VDH MAX',
            'image' => 'motherboard.png',
            'price' => 5000,
            'description' => 'Материнская плата MSI B450M PRO-VDH MAX',
            'category_id' => 3,
            'user_id' => fake()->numberBetween(1, 10),
            'active' => 1,
            'amount' => fake()->numberBetween(1, 10),
        ]);

        \App\Models\Market::create([
            'name' => 'MSI B450M PRO-VDH MAX',
            'image' => 'motherboard.png',
            'price' => 5000,
            'description' => 'Материнская плата MSI B450M PRO-VDH MAX',
            'category_id' => 3,
            'user_id' => fake()->numberBetween(1, 10),
            'active' => 1,
            'amount' => fake()->numberBetween(1, 10),
        ]);

        \App\Models\Market::create([
            'name' => 'MSI B450M PRO-VDH MAX',
            'image' => 'motherboard.png',
            'price' => 5000,
            'description' => 'Материнская плата MSI B450M PRO-VDH MAX',
            'category_id' => 3,
            'user_id' => fake()->numberBetween(1, 10),
            'active' => 1,
            'amount' => fake()->numberBetween(1, 10),
        ]);

        // ram

        \App\Models\Market::create([
            'name' => 'HyperX Fury 8GB DDR4 2666MHz',
            'image' => 'ram.jpg',
            'price' => 3000,
            'description' => 'Оперативная память HyperX Fury 8GB DDR4 2666MHz',
            'category_id' => 4,
            'user_id' => fake()->numberBetween(1, 10),
            'active' => 1,
            'amount' => fake()->numberBetween(1, 10),
        ]);

        \App\Models\Market::create([
            'name' => 'HyperX Fury 8GB DDR4 2666MHz',
            'image' => 'ram.jpg',
            'price' => 3000,
            'description' => 'Оперативная память HyperX Fury 8GB DDR4 2666MHz',
            'category_id' => 4,
            'user_id' => fake()->numberBetween(1, 10),
            'active' => 1,
            'amount' => fake()->numberBetween(1, 10),
        ]);

        \App\Models\Market::create([
            'name' => 'HyperX Fury 8GB DDR4 2666MHz',
            'image' => 'ram.jpg',
            'price' => 3000,
            'description' => 'Оперативная память HyperX Fury 8GB DDR4 2666MHz',
            'category_id' => 4,
            'user_id' => fake()->numberBetween(1, 10),
            'active' => 1,
            'amount' => fake()->numberBetween(1, 10),
        ]);

        // hard drive

        \App\Models\Market::create([
            'name' => 'Seagate BarraCuda 1TB',
            'image' => 'harddrive.jpg',
            'price' => 3000,
            'description' => 'Жесткий диск Seagate BarraCuda 1TB',
            'category_id' => 5,
            'user_id' => fake()->numberBetween(1, 10),
            'active' => 1,
            'amount' => fake()->numberBetween(1, 10),
        ]);

        \App\Models\Market::create([
            'name' => 'Seagate BarraCuda 2TB',
            'image' => 'harddrive.jpg',
            'price' => 6000,
            'description' => 'Жесткий диск Seagate BarraCuda 2TB',
            'category_id' => 5,
            'user_id' => fake()->numberBetween(1, 10),
            'active' => 1,
            'amount' => fake()->numberBetween(1, 10),
        ]);

        \App\Models\Market::create([
            'name' => 'Seagate BarraCuda 3TB',
            'image' => 'harddrive.jpg',
            'price' => 9000,
            'description' => 'Жесткий диск Seagate BarraCuda 3TB',
            'category_id' => 5,
            'user_id' => fake()->numberBetween(1, 10),
            'active' => 1,
            'amount' => fake()->numberBetween(1, 10),
        ]);

        // power

        \App\Models\Market::create([
            'name' => 'Be Quiet! System Power 9 500W',
            'image' => 'power.png',
            'price' => 4000,
            'description' => 'Блок питания Be Quiet! System Power 9 500W',
            'category_id' => 6,
            'user_id' => fake()->numberBetween(1, 10),
            'active' => 1,
            'amount' => fake()->numberBetween(1, 10),
        ]);

        \App\Models\Market::create([
            'name' => 'Be Quiet! System Power 9 500W',
            'image' => 'power.png',
            'price' => 4000,
            'description' => 'Блок питания Be Quiet! System Power 9 500W',
            'category_id' => 6,
            'user_id' => fake()->numberBetween(1, 10),
            'active' => 1,
            'amount' => fake()->numberBetween(1, 10),
        ]);

        \App\Models\Market::create([
            'name' => 'Be Quiet! System Power 9 500W',
            'image' => 'power.png',
            'price' => 4000,
            'description' => 'Блок питания Be Quiet! System Power 9 500W',
            'category_id' => 6,
            'user_id' => fake()->numberBetween(1, 10),
            'active' => 1,
            'amount' => fake()->numberBetween(1, 10),
        ]);

        // frame

        \App\Models\Market::create([
            'name' => 'Cooler Master MasterBox Lite 3.1',
            'image' => 'frame.jpg',
            'price' => 5000,
            'description' => 'Корпус Cooler Master MasterBox Lite 3.1',
            'category_id' => 7,
            'user_id' => fake()->numberBetween(1, 10),
            'active' => 1,
            'amount' => fake()->numberBetween(1, 10),
        ]);

        \App\Models\Market::create([
            'name' => 'Cooler Master MasterBox Lite 3.1',
            'image' => 'frame.jpg',
            'price' => 5000,
            'description' => 'Корпус Cooler Master MasterBox Lite 3.1',
            'category_id' => 7,
            'user_id' => fake()->numberBetween(1, 10),
            'active' => 1,
            'amount' => fake()->numberBetween(1, 10),
        ]);

        \App\Models\Market::create([
            'name' => 'Cooler Master MasterBox Lite 3.1',
            'image' => 'frame.jpg',
            'price' => 5000,
            'description' => 'Корпус Cooler Master MasterBox Lite 3.1',
            'category_id' => 7,
            'user_id' => fake()->numberBetween(1, 10),
            'active' => 1,
            'amount' => fake()->numberBetween(1, 10),
        ]);
    }
}

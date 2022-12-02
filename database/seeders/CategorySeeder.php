<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Category::create([
            'name' => 'Видеокарта',
        ]);

        \App\Models\Category::create([
            'name' => 'Процессор',
        ]);

        \App\Models\Category::create([
            'name' => 'Материнская плата',
        ]);

        \App\Models\Category::create([
            'name' => 'Оперативная память',
        ]);

        \App\Models\Category::create([
            'name' => 'Жесткий диск',
        ]);

        \App\Models\Category::create([
            'name' => 'Блок питания',
        ]);

        \App\Models\Category::create([
            'name' => 'Корпус',
        ]);
    }
}

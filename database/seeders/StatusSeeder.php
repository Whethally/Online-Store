<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Status::create([
            'name' => 'На рассмотрении',
        ]);

        \App\Models\Status::create([
            'name' => 'В обработке',
        ]);

        \App\Models\Status::create([
            'name' => 'Завершен',
        ]);

        \App\Models\Status::create([
            'name' => 'Отменен',
        ]);
    }
}

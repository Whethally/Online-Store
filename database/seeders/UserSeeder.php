<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'Виталий',
            'surname' => 'Егоров',
            'patronymic' => 'Викторович',
            'login' => 'root',
            'email' => 'root@mail.ru',
            'active' => 1,
            'admin' => 1,
            'password' => 'rootroot',
        ]);

        \App\Models\User::factory()->count(10)->create();
    }
}

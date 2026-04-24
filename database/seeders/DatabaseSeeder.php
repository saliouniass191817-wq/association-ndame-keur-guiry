<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::factory(8)->create();

        User::factory()->create([
            'first_name' => 'Admin',
            'second_name' => 'Village',
            'last_name' => 'AJNDKK',
            'email' => 'admin@ajndkk.test',
            'role' => 'admin',
            'sex' => 'Homme',
            'civility' => 'Célibatire',
            'profession' => 'Coordinateur',
            'age' => 23,
        ]);
    }
}

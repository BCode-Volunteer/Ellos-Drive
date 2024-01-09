<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Daniel Admin',
            'email' => 'admin@ellos.com',
            'role' => RoleEnum::ADMIN->value,
            'password' => bcrypt('123456'),
        ]);

        User::factory()->create([
            'name' => 'Daniel Cliente',
            'email' => 'teste@ellos.com',
            'role' => RoleEnum::CLIENT->value,
            'password' => bcrypt('123456'),
        ]);

        User::factory()
            ->count(10)
            ->create();
    }
}

<?php

namespace Database\Seeders;
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
            'name' => 'User 1',
            'email' => 'user1@test.com',
            'password' => bcrypt('password1'),
        ]);

        User::factory()->create([
            'name' => 'User 2',
            'email' => 'user2@test.com',
            'password' => bcrypt('password2'),
        ]);

        User::factory()->create([
            'name' => 'User 3',
            'email' => 'user3@test.com',
            'password' => bcrypt('password3'),
        ]);

        User::factory()->create([
            'name' => 'User 4',
            'email' => 'user4@test.com',
            'password' => bcrypt('password4'),
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'test@example.com',
        ]);

        User::factory()->create([
            'name' => 'John DOE',
            'email' => 'john@doe',
            'password' => 'john@doe',
        ]);

        User::factory()->create([
            'name' => 'Jane DOE',
            'email' => 'jane@doe',
            'password' => 'jane@doe',
        ]);
    }
}

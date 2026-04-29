<?php

namespace Database\Seeders;

use App\Models\MySQL\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //User::factory(10)->create();

        //$this->call(ResourceSeeder::class);

        /*User::create([
            'name' => 'Nadal',
            'email' => 'nadal7x@gmail.com',
            'password' => Hash::make('password'),
        ]);*/

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

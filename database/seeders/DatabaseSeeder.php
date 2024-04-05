<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Option;
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
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Worker']);
        Role::create(['name' => 'User']);

        User::factory()->create([
            'name' => 'AdminAccount',
            'email' => 'admin@bowling.com',
            'phone' => '123456789',
            'role_id' => '1',
            'password' => bcrypt('admin123'),
        ]);
        Option::create([
            'name' => 'Snackpakket Basis',
            'description' => 'Een eenvoudig snackpakket',
            'price' => 5.99,
        ]);

        Option::create([
            'name' => 'Snackpakket Luxe',
            'description' => 'Een luxe snackpakket',
            'price' => 10.99,
        ]);

        Option::create([
            'name' => 'Kinderpartij',
            'description' => 'Chips, cola en een verrassing',
            'price' => 7.99,
        ]);

        Option::create([
            'name' => 'Vrijgezellenfeest',
            'description' => 'Feestpakket voor een geweldig vrijgezellenfeest',
            'price' => 49.99,
        ]);

        Option::create([
            'name' => 'Filmavond',
            'description' => 'Een pakket voor een gezellige filmavond thuis',
            'price' => 15.99,
        ]);
    }
}

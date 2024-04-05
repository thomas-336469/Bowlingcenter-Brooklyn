<?php

namespace Database\Seeders;

use App\Models\Option;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Option::insert([
            'name' => 'Snackpakket Basis',
            'description' => 'Een eenvoudig snackpakket',
            'price' => 5.99,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Option::insert([
            'name' => 'Snackpakket Luxe',
            'description' => 'Een luxe snackpakket',
            'price' => 10.99,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Option::insert([
            'name' => 'Kinderpartij',
            'description' => 'Chips, cola en een verrassing',
            'price' => 7.99,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Option::insert([
            'name' => 'Vrijgezellenfeest',
            'description' => 'Feestpakket voor een geweldig vrijgezellenfeest',
            'price' => 49.99,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Option::insert([
            'name' => 'Filmavond',
            'description' => 'Een pakket voor een gezellige filmavond thuis',
            'price' => 15.99,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

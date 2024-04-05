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
            'name' => 'Snackpakket',
            'description' => 'Lekker snacken tijdens het bowlen',
            'price' => '10',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

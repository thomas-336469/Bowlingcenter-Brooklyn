<?php

namespace Database\Seeders;

use App\Models\Alley;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlleySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Alley::insert([
            'alley_number' => '1',
            'has_bumpers' => '0',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

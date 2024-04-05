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
            'has_bumpers' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Alley::insert([
            'alley_number' => '2',
            'has_bumpers' => '0',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Alley::insert([
            'alley_number' => '3',
            'has_bumpers' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Alley::insert([
            'alley_number' => '4',
            'has_bumpers' => '0',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Alley::insert([
            'alley_number' => '5',
            'has_bumpers' => '0',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

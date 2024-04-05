<?php

namespace Database\Seeders;

use App\Models\Rate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rate::insert([
            'weekday' => 'maandag',
            'period' => '14:00 - 18:00',
            'rental_price' => '10',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

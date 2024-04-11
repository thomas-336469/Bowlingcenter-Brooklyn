<?php

namespace Database\Seeders;

use App\Models\Score;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Score::insert([
            'reservation_id' => 1,
            'name' => 'Mazin Jamil',
            'score' => '47',
            'date' => '2024-04-08',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Score::insert([
            'reservation_id' => 1,
            'name' => 'Wilco Van de Grift',
            'score' => '51',
            'date' => '2024-04-09',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Score::insert([
            'reservation_id' => 1,
            'name' => 'Dennis van Wakeren',
            'score' => '39',
            'date' => '2024-04-09',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Score::insert([
            'reservation_id' => 1,
            'name' => 'Arjan de Ruijter',
            'score' => '49',
            'date' => '2024-04-08',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Score::insert([
            'reservation_id' => 1,
            'name' => 'Hans Odijk',
            'score' => '93',
            'date' => '2024-04-01',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

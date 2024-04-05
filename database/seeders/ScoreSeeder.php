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
            'name' => 'Tommy',
            'score' => '10',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Score::insert([
            'reservation_id' => 1,
            'name' => 'Kimberly',
            'score' => '74',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Score::insert([
            'reservation_id' => 1,
            'name' => 'Sjaak',
            'score' => '91',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Score::insert([
            'reservation_id' => 1,
            'name' => 'Jolanda',
            'score' => '45',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Score::insert([
            'reservation_id' => 1,
            'name' => 'Henk',
            'score' => '23',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\UserReservation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserReservation::insert([
            'user_id' => '1',
            'alley_id' => '1',
            'rate_id' => '1',
            'option_id' => '1',
            'date' => now(),
            'duration' => '1',
            'total_cost' => '100',
            'amount_of_people' => '2',
            'amount_of_children' => '0',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\WorkerReservation;
use App\Models\Rate;
use App\Models\Option;
use App\Models\Alley;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Queue\Worker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create roles
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Worker']);
        Role::create(['name' => 'User']);

        // Create an admin account
        User::factory()->create([
            'name' => 'AdminAccount',
            'email' => 'admin@bowling.com',
            'phone' => '123456789',
            'role_id' => '1',
            'password' => bcrypt('admin123'),
        ]);
                // Create a test rate
                Rate::create([
                    'weekday' => 'Monday',
                    'period' => 'Day',
                    'rental_price' => 10,
                ]);
        
                Option::create([
                    'name' => 'Bowling',
                    'description' => 'Bowling',
                    'price' => 10,
                ]);
        
                Alley::create([
                    'alley_number' => 1,
                    'has_bumpers' => 0,
                ]);
        
                // Create 3 test reservations
                WorkerReservation::create([
                    'option_id' => 1,
                    'rate_id' => 1,
                    'alley_id' => 1,
                    'user_name' => 'Test User',
                    'user_phone' => '123456789',
                    'date' => '2024-04-05 12:00:00',
                    'duration' => 1,
                    'total_cost' => 10,
                    'amount_of_people' => 2,
                    'amount_of_children' => 0,
                ]);
                WorkerReservation::create([
                    'option_id' => 1,
                    'rate_id' => 1,
                    'Alley_id' => 1,
                    'user_name' => 'Test User 2',
                    'user_phone' => '123456789',
                    'date' => '2024-04-05 14:00:00',
                    'duration' => 1,
                    'total_cost' => 10,
                    'amount_of_people' => 2,
                    'amount_of_children' => 0,
                ]);
                WorkerReservation::create([
                    'option_id' => 1,
                    'rate_id' => 1,
                    'alley_id' => 1,
                    'user_name' => 'Test User 3',
                    'user_phone' => '123456789',
                    'date' => '2024-04-05 16:00:00',
                    'duration' => 1,
                    'total_cost' => 10,
                    'amount_of_people' => 2,
                    'amount_of_children' => 0,
                ]);
            }
        }
<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\WorkerReservation;
use App\Models\Rate;
use App\Models\Alley;
use App\Models\Option;
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
            'rental_price' => 24,
        ]);
        Rate::create([
            'weekday' => 'Monday',
            'period' => 'Night',
            'rental_price' => 24,
        ]);
        Rate::create([
            'weekday' => 'Tuesday',
            'period' => 'Day',
            'rental_price' => 24,
        ]);
        Rate::create([
            'weekday' => 'Tuesday',
            'period' => 'Night',
            'rental_price' => 24,
        ]);
        Rate::create([
            'weekday' => 'Wednesday',
            'period' => 'Day',
            'rental_price' => 24,
        ]);
        Rate::create([
            'weekday' => 'Wednesday',
            'period' => 'Night',
            'rental_price' => 24,
        ]);
        Rate::create([
            'weekday' => 'Thursday',
            'period' => 'Day',
            'rental_price' => 24,
        ]);
        Rate::create([
            'weekday' => 'Thursday',
            'period' => 'Night',
            'rental_price' => 24,
        ]);
        Rate::create([
            'weekday' => 'Friday',
            'period' => 'Day',
            'rental_price' => 28,
        ]);
        Rate::create([
            'weekday' => 'Friday',
            'period' => 'Night',
            'rental_price' => 33.50,
        ]);
        Rate::create([
            'weekday' => 'Saturday',
            'period' => 'Day',
            'rental_price' => 28,
        ]);
        Rate::create([
            'weekday' => 'Saturday',
            'period' => 'Night',
            'rental_price' => 33.50,
        ]);
        Rate::create([
            'weekday' => 'Sunday',
            'period' => 'Day',
            'rental_price' => 28,
        ]);
        Rate::create([
            'weekday' => 'Sunday',
            'period' => 'Night',
            'rental_price' => 33.50,
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
        Alley::create([
            'alley_number' => 2,
            'has_bumpers' => 1,
        ]);
        Alley::create([
            'alley_number' => 3,
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

        // Create a test rate
        Rate::create([
            'weekday' => 'Monday',
            'period' => 'Day',
            'rental_price' => 24,
        ]);
        Rate::create([
            'weekday' => 'Monday',
            'period' => 'Night',
            'rental_price' => 24,
        ]);
        Rate::create([
            'weekday' => 'Tuesday',
            'period' => 'Day',
            'rental_price' => 24,
        ]);
        Rate::create([
            'weekday' => 'Tuesday',
            'period' => 'Night',
            'rental_price' => 24,
        ]);
        Rate::create([
            'weekday' => 'Wednesday',
            'period' => 'Day',
            'rental_price' => 24,
        ]);
        Rate::create([
            'weekday' => 'Wednesday',
            'period' => 'Night',
            'rental_price' => 24,
        ]);
        Rate::create([
            'weekday' => 'Thursday',
            'period' => 'Day',
            'rental_price' => 24,
        ]);
        Rate::create([
            'weekday' => 'Thursday',
            'period' => 'Night',
            'rental_price' => 24,
        ]);
        Rate::create([
            'weekday' => 'Friday',
            'period' => 'Day',
            'rental_price' => 28,
        ]);
        Rate::create([
            'weekday' => 'Friday',
            'period' => 'Night',
            'rental_price' => 33.50,
        ]);
        Rate::create([
            'weekday' => 'Saturday',
            'period' => 'Day',
            'rental_price' => 28,
        ]);
        Rate::create([
            'weekday' => 'Saturday',
            'period' => 'Night',
            'rental_price' => 33.50,
        ]);
        Rate::create([
            'weekday' => 'Sunday',
            'period' => 'Day',
            'rental_price' => 28,
        ]);
        Rate::create([
            'weekday' => 'Sunday',
            'period' => 'Night',
            'rental_price' => 33.50,
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
        Alley::create([
            'alley_number' => 2,
            'has_bumpers' => 1,
        ]);
        Alley::create([
            'alley_number' => 3,
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

        $this->call([
            UserReservationSeeder::class,
            ScoreSeeder::class,
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Alley;
use App\Models\PersonType;
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
        // Create person types
        PersonType::create(['name' => 'Customer']);
        PersonType::create(['name' => 'Employee']);
        PersonType::create(['name' => 'Manager']);
        PersonType::create(['name' => 'Admin']);

        // Create alleys
        Alley::create(['alley_number' => 1, 'has_bumpers' => false]);
        Alley::create(['alley_number' => 2, 'has_bumpers' => false]);
        Alley::create(['alley_number' => 3, 'has_bumpers' => false]);
        Alley::create(['alley_number' => 4, 'has_bumpers' => false]);
        Alley::create(['alley_number' => 5, 'has_bumpers' => false]);
        Alley::create(['alley_number' => 6, 'has_bumpers' => false]);
        Alley::create(['alley_number' => 7, 'has_bumpers' => true]);
        Alley::create(['alley_number' => 8, 'has_bumpers' => true]);

        // Define people
        $people = [
            [
                'person_type_id' => 1,
                'first_name' => 'Mazin',
                'middle_name' => null,
                'last_name' => 'Jamil',
                'call_name' => 'Mazin',
                'is_adult' => true,
            ],
            [
                'person_type_id' => 1,
                'first_name' => 'Arjan',
                'middle_name' => 'de',
                'last_name' => 'Ruijter',
                'call_name' => 'Arjan',
                'is_adult' => true,
            ],
            [
                'person_type_id' => 1,
                'first_name' => 'Hans',
                'middle_name' => null,
                'last_name' => 'Odijk',
                'call_name' => 'Hans',
                'is_adult' => true,
            ],
            [
                'person_type_id' => 1,
                'first_name' => 'Dennis',
                'middle_name' => 'van',
                'last_name' => 'Wakeren',
                'call_name' => 'Dennis',
                'is_adult' => true,
            ],
            [
                'person_type_id' => 2,
                'first_name' => 'Wilco',
                'middle_name' => 'van de',
                'last_name' => 'Grift',
                'call_name' => 'Wilco',
                'is_adult' => true,
            ],
            [
                'person_type_id' => 3,
                'first_name' => 'Tom',
                'middle_name' => null,
                'last_name' => 'Sanders',
                'call_name' => 'Tom',
                'is_adult' => false,
            ],
            [
                'person_type_id' => 3,
                'first_name' => 'Andrew',
                'middle_name' => null,
                'last_name' => 'Sanders',
                'call_name' => 'Andrew',
                'is_adult' => false,
            ],
            [
                'person_type_id' => 3,
                'first_name' => 'Julian',
                'middle_name' => null,
                'last_name' => 'Kaldenheuvel',
                'call_name' => 'Julian',
                'is_adult' => true,
            ]
        ];

        // Create people
        foreach ($people as $person) {
            \App\Models\Person::create($person);
        }

        // Define reservations
        $reservations = [
            [
                'person_id' => 1,
                'reservation_number' => '2022122000001',
                'reservation_date' => '2022-12-20',
                'reservation_duration' => 1,
                'reservation_start_time' => '15:00:00',
                'reservation_end_time' => '16:00:00',
                'number_of_adults' => 4,
                'number_of_children' => 2,
                'alley_id' => 7,
            ],
            [
                'person_id' => 2,
                'reservation_number' => '2022122000002',
                'reservation_date' => '2022-12-20',
                'reservation_duration' => 1,
                'reservation_start_time' => '17:00:00',
                'reservation_end_time' => '18:00:00',
                'number_of_adults' => 4,
                'number_of_children' => null,
                'alley_id' => 2,
            ],
            [
                'person_id' => 3,
                'reservation_number' => '2022122400003',
                'reservation_date' => '2022-12-24',
                'reservation_duration' => 2,
                'reservation_start_time' => '16:00:00',
                'reservation_end_time' => '18:00:00',
                'number_of_adults' => 4,
                'number_of_children' => null,
                'alley_id' => 3,
            ],
            [
                'person_id' => 1,
                'reservation_number' => '2022122700004',
                'reservation_date' => '2022-12-27',
                'reservation_duration' => 2,
                'reservation_start_time' => '17:00:00',
                'reservation_end_time' => '19:00:00',
                'number_of_adults' => 2,
                'number_of_children' => null,
                'alley_id' => 8,
            ],
            [
                'person_id' => 4,
                'reservation_number' => '2022122800005',
                'reservation_date' => '2022-12-28',
                'reservation_duration' => 1,
                'reservation_start_time' => '14:00:00',
                'reservation_end_time' => '15:00:00',
                'number_of_adults' => 3,
                'number_of_children' => null,
                'alley_id' => 1,
            ],
            [
                'person_id' => 5,
                'reservation_number' => '2022122800006',
                'reservation_date' => '2022-12-28',
                'reservation_duration' => 2,
                'reservation_start_time' => '19:00:00',
                'reservation_end_time' => '21:00:00',
                'number_of_adults' => 2,
                'number_of_children' => null,
                'alley_id' => 1,
            ]
        ];

        // Create reservations
        foreach ($reservations as $reservation) {
            \App\Models\Reservation::create($reservation);
        }
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
    }
}

<?php

namespace Database\Seeders;

use App\Models\PersonType;
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
            ]
        ];

        // Create reservations
        foreach ($reservations as $reservation) {
            \App\Models\Reservation::create($reservation);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Alley;
use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Worker']);
        Role::create(['name' => 'User']);

        User::factory()->create([
            'name' => 'AdminAccount',
            'email' => 'admin@bowling.com',
            'phone' => '123456789',
            'role_id' => '1',
            'password' => bcrypt('admin123'),
        ]);

        $this->call([
            AlleySeeder::class,
            RateSeeder::class,
            OptionSeeder::class,
            UserReservationSeeder::class,
        ]);
    }
}

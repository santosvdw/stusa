<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Oefentoets;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Oefentoets::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        // Oefentoets::create([
        //     'vak_id' => '1',
        //     'onderwerp' => 'Test onderwerp',
        //     'titel' => $this->faker->sentence(),
        //     'gebruiker_id' => '1',
        //     'jaarlaag' => '5',
        //     'school_id' => '1',

        //     'niveau' => 'VWO',
        //     'beschrijving' => $this->faker->sentence(),
        // ]);
    }
}

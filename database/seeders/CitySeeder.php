<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Interactive database seeding
        $seedCount = (int) $this->command->ask('How many "city" seeds would you like to create?', 20);
        City::factory($seedCount)->create();
    }
}

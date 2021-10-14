<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Interactive database seeding
        $seedCount = (int) $this->command->ask('How many "country" seeds would you like to create?', 20);
        Country::factory($seedCount)->create();
    }
}

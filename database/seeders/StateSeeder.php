<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Interactive database seeding
        $seedCount = (int) $this->command->ask('How many "state" seeds would you like to create?', 200);
        State::factory($seedCount)->create();
    }
}

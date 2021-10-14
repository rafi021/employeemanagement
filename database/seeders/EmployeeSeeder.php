<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Interactive database seeding
        $seedCount = (int) $this->command->ask('How many "employee" seeds would you like to create?', 200);
        Employee::factory($seedCount)->create();
    }
}

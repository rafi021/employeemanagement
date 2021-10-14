<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Interactive database seeding
        $seedCount = (int) $this->command->ask('How many "department" seeds would you like to create?', 20);
        Department::factory($seedCount)->create();
    }
}

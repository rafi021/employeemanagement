<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Country;
use App\Models\Department;
use App\Models\Employee;
use App\Models\State;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'last_name' => $this->faker->lastName,
            'first_name' => $this->faker->firstName,
            'middle_name' => $this->faker->lastName,
            'address' => $this->faker->address,
            'department_id' => Department::select('id')->get()->random()->id,
            'country_id' => Country::select('id')->get()->random()->id,
            'city_id' => City::select('id')->get()->random()->id,
            'state_id' => State::select('id')->get()->random()->id,
            'zip_code' => $this->faker->postcode,
            'birthdate' => $this->faker->date,
            'date_hired' => $this->faker->date,
        ];
    }
}

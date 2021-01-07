<?php

namespace Database\Factories;

use App\Models\Employee;
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
        $boolArray = [true, false, false, false, false, false];
        return [
            'full_name' => $this->faker->firstName(),
            'access_code' => rand(11111, 99999),
            'position_id' => rand(1, 20),
            'group_id' => rand(1, 5),
            'is_admin' => $boolArray[rand(0, count($boolArray) - 1)]
        ];
    }
}

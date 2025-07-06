<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'position' => $this->faker->jobTitle,
            'phone_number' => $this->faker->phoneNumber,
            'status' => $this->faker->randomElement(['permanent', 'contract']),
            'photo' => null, // or add fake image path
            'department_id' => Department::inRandomOrder()->first()?->id ?? Department::factory(),
        ];
    }
}
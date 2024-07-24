<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'Name'       => $this->faker->name(),
            'Position'   => $this->faker->word(),
            'Email'      => $this->faker->unique()->safeEmail(),
            'Phone'      => $this->faker->phoneNumber(),
        ];
    }
}

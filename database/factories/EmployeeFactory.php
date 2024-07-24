<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    public function definition(): array
    {
        return [
            'created_at'         => Carbon::now(),
            'updated_at'         => Carbon::now(),
            'name'               => $this->faker->name(),
            'position_id'        => Position::pluck('id')->random(),
            'email'              => $this->faker->unique()->safeEmail(),
            'phone'              => '+38 (095) 467-08-86',
            'salary'             => $this->faker->numberBetween(100, 1000),
            'date_of_employment' => $this->faker->date(),
        ];
    }
}

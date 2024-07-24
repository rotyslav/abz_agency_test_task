<?php

namespace Database\Factories;

use App\Position;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PositionFactory extends Factory{
    protected $model = Position::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),//
'updated_at' => Carbon::now(),
'position' => $this->faker->word(),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Day;
use Illuminate\Database\Eloquent\Factories\Factory;

class DayFactory extends Factory
{
    protected $model = Day::class;

    public function definition()
    {
        return [
            'date' => $this->faker->date,
            'trip_id' => \App\Models\Trip::factory(),
        ];
    }
}

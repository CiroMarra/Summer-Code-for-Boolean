<?php

namespace Database\Factories;

use App\Models\Stop;
use Illuminate\Database\Eloquent\Factories\Factory;

class StopFactory extends Factory
{
    protected $model = Stop::class;

    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'description' => $this->faker->sentence,
            'image' => $this->faker->imageUrl,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'day_id' => \App\Models\Day::factory(),
        ];
    }
}
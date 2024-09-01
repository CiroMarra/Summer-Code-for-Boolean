<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Stop;
use App\Models\Day;

class StopSeeder extends Seeder
{
    public function run()
    {
        // Per ogni giorno, crea 4 tappe di esempio
        Day::all()->each(function ($day) {
            Stop::factory()->count(4)->create([
                'day_id' => $day->id
            ]);
        });
    }
}
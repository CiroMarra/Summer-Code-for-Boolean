<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Day;
use App\Models\Trip;

class DaySeeder extends Seeder
{
    public function run()
    {
        // Per ogni viaggio, crea 3 giorni di esempio
        Trip::all()->each(function ($trip) {
            Day::factory()->count(3)->create([
                'trip_id' => $trip->id
            ]);
        });
    }
}
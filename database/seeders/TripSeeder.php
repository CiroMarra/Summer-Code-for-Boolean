<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Trip;

class TripSeeder extends Seeder
{
    public function run()
    {
        // Crea 5 viaggi di esempio
        Trip::factory()->count(5)->create();
    }
}

<?php

namespace Database\Seeders;

use App\Models\Tour;
use App\Models\Travel;
use Illuminate\Database\Seeder;

class TravelTourSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 50; $i++) {
            $travel = Travel::factory()->create();
            Tour::factory(10)->create(['travel_id' => $travel->id]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Availability;
use Illuminate\Database\Seeder;

class AvailabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 600; $i++) {
            $date = \Carbon\Carbon::now()->startOfYear()->addDays($i);
            Availability::create([
                'date' => $date,
                'pm' => $date->isWeekday(),
                'am' => $date->isWeekday(),
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Enums\CvSectionType;
use App\Models\CvSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CvSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CvSection::factory()
            ->count(3)
            ->create();

        CvSection::factory()
            ->create(['type' => CvSectionType::Experience]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\BulletPoint;
use Illuminate\Database\Seeder;

class BulletPointSeeder extends Seeder
{
    /**
     * Seed the application's database with demo data
     * for development only.
     *
     * 10 Bullet points
     */
    public function run(): void
    {
        BulletPoint::factory()
            ->count(10)
            ->create();
    }
}

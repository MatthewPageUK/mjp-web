<?php

namespace Database\Seeders;

use App\Models\{
    HitCounter,
};
use Database\Factories\HitCounterFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HitCounterSeeder extends Seeder
{
    /**
     * Seed the application's database with demo
     * Hit Counter data for development only.
     *
     */
    public function run(): void
    {
        DB::table((new HitCounter)->getTableName)->truncate();

        HitCounterFactory::new()->count(5)->create();
    }
}

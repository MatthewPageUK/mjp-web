<?php

namespace Database\Seeders;

use App\Models\{
    Book,
    Image,
    Reading,
    Skill,
};
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Seed the application's database with demo data
     * for development only.
     */
    public function run(): void
    {
        Book::factory()
            ->count(10)
            ->has(Reading::factory()->count(5))
            ->create()
            ->each(function ($book) {
                $book->skills()->attach(Skill::all()->random(3));
                $book->image()->save(Image::factory()->make(['url' => 'https://loremflickr.com/480/640/book?lock=' . rand(1000, 100000)]));
            });
    }
}

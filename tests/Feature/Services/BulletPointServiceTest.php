<?php

namespace Tests\Feature\Services;

use App\Models\BulletPoint;
use App\Services\Ui\BulletPointService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BulletPointServiceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the service returns the bullet points in order.
     */
    public function test_it_returns_bullet_points_in_order(): void
    {
        BulletPoint::factory(5)->sequence(
            ['name' => 'Bullet Point 1', 'order' => 5],
            ['name' => 'Bullet Point 2', 'order' => 4],
            ['name' => 'Bullet Point 3', 'order' => 3],
            ['name' => 'Bullet Point 4', 'order' => 2],
            ['name' => 'Bullet Point 5', 'order' => 1],
        )->create();

        $bulletPoints = app(BulletPointService::class)->getAll();

        $this->assertEquals('Bullet Point 5', $bulletPoints->first()->name);
        $this->assertEquals('Bullet Point 1', $bulletPoints->last()->name);
    }

    /**
     * Test a rainbow colour attribute is added to the bullet points.
     */
    public function test_it_adds_a_rainbow_colour_to_the_bullet_points(): void
    {
        BulletPoint::factory(5)->create();

        $bulletPointService = app(BulletPointService::class);

        $bullets = $bulletPointService->getAll();

        $this->assertNotEmpty($bullets->first()->colour);
        $this->assertNotEquals($bullets->first()->colour, $bullets->last()->colour);
    }
}

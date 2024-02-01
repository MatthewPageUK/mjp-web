<?php

namespace Tests\Feature\ProjectQuote;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AvailabilityPageTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test availability page has link to project quote
     */
    public function test_availability_has_link_to_project_quote(): void
    {
        $response = $this->get(route('availability'));
        $response->assertSee(route('project-quote'));
    }
}

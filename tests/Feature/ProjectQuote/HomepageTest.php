<?php

namespace Tests\Feature\ProjectQuote;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomepageTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test homepage has link to project quote
     */
    public function test_homepage_has_link_to_project_quote(): void
    {
        $response = $this->get(route('home'));
        $response->assertSee(route('project-quote'));
    }

}

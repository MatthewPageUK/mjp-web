<?php

namespace Tests\Feature;

use App\Contracts\Homepage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Homepage Feature tests.
 *
 * These test the Homepage service public methods.
 *
 */
class HomepageTest extends TestCase
{
    use RefreshDatabase;

    protected Homepage $homepage;

    public function setUp(): void
    {
        parent::setUp();
        $this->homepage = app(Homepage::class);
    }

    public function test_name_can_be_set(): void
    {
        $this->homepage->setName('test_name_can_be_set');
        $this->assertEquals('test_name_can_be_set', $this->homepage->getName());
    }

    public function test_name_can_be_retrieved(): void
    {
        $this->homepage->setName('test_name_can_be_retrieved');
        $this->assertEquals('test_name_can_be_retrieved', $this->homepage->getName());
    }

    public function test_tagline_can_be_set(): void
    {
        $this->homepage->setTagline('test_tagline_can_be_set');
        $this->assertEquals('test_tagline_can_be_set', $this->homepage->getTagline());
    }

    public function test_tagline_can_be_retrieved(): void
    {
        $this->homepage->setTagline('test_tagline_can_be_retrieved');
        $this->assertEquals('test_tagline_can_be_retrieved', $this->homepage->getTagline());
    }

    public function test_introduction_can_be_set(): void
    {
        $this->homepage->setIntroduction('test_introduction_can_be_set');
        $this->assertEquals('test_introduction_can_be_set', $this->homepage->getIntroduction());
    }

    public function test_introduction_can_be_retrieved(): void
    {
        $this->homepage->setIntroduction('test_introduction_can_be_set');
        $this->assertEquals('test_introduction_can_be_set', $this->homepage->getIntroduction());
    }

}

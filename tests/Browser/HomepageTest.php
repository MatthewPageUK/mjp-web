<?php

namespace Tests\Browser;

use App\Contracts\Homepage;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class HomepageTest extends DuskTestCase
{
    public function test_has_content_name(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/');
            $this->assertEquals(app(Homepage::class)->getName(), $browser->text('@content-name'));
        });
    }
}

<?php

namespace Tests\Feature;

use App\Facades\Settings;
use Illuminate\Foundation\Application;
use Tests\TestCase;

/**
 * UI Tests for the Footer component.
 *
 */
class UiFooterTest extends TestCase
{
    /**
     * Test Footer has link to homepage
     */
    public function test_ui_footer_has_link_to_homepage(): void
    {
        $this->blade('<x-ui.layout.footer />')->assertSee(route('home'));
    }

    /**
     * Test Footer has link to top of page
     */
    public function test_ui_footer_has_link_to_top_of_page(): void
    {
        $this->blade('<x-ui.layout.footer />')->assertSee('#top');
    }

    /**
     * Test Footer shows site name
     */
    public function test_ui_footer_shows_site_name(): void
    {
        $this->artisan('mjpweb:demosetup');

        $this->blade('<x-ui.layout.footer />')->assertSee(Settings::getValue('site_name'));
    }

    /**
     * Test Footer shows site tagline
     */
    public function test_ui_footer_shows_site_tagline(): void
    {
        $this->artisan('mjpweb:demosetup');

        $this->blade('<x-ui.layout.footer />')->assertSee(Settings::getValue('site_tagline'));
    }

    /**
     * Test Footer has link to source code
     */
    public function test_ui_footer_has_link_to_source_code(): void
    {
        $this->artisan('mjpweb:demosetup');

        $this->blade('<x-ui.layout.footer />')->assertSee(Settings::getValue('source'));
    }

    /**
     * Test Footer shows copyright year
     */
    public function test_ui_footer_shows_copyright_year(): void
    {
        $this->blade('<x-ui.layout.footer />')->assertSeeInOrder(['Copyright', date('Y')]);
    }

    /**
     * Test Footer shows versions
     */
    public function test_ui_footer_shows_versions(): void
    {
        $this->blade('<x-ui.layout.footer />')->assertSeeInOrder([Application::VERSION, PHP_VERSION]);
    }

}

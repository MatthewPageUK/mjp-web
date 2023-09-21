<?php

namespace Tests\Feature;

use App\Facades\Settings;
use Tests\TestCase;

/**
 * UI Tests for the Header component.
 *
 */
class UiHeaderTest extends TestCase
{
    /**
     * Test Header has link to homepage
     */
    public function test_ui_header_has_link_to_homepage(): void
    {
        $this->blade('<x-ui.layout.header />')->assertSee(route('home'));
    }

    /**
     * Test Header has link to skills page
     */
    public function test_ui_header_has_link_to_skills_page(): void
    {
        $this->blade('<x-ui.layout.header />')->assertSee(route('skills'));
    }

    /**
     * Test Header has link to experience page
     */
    public function test_ui_header_has_link_to_experience_page(): void
    {
        $this->blade('<x-ui.layout.header />')->assertSee(route('experiences'));
    }

    /**
     * Test Header has link to projects page
     */
    public function test_ui_header_has_link_to_projects_page(): void
    {
        $this->blade('<x-ui.layout.header />')->assertSee(route('projects'));
    }

    /**
     * Test Header has link to demos page
     */
    public function test_ui_header_has_link_to_demos_page(): void
    {
        $this->blade('<x-ui.layout.header />')->assertSee(route('demos'));
    }

    /**
     * Test Header has link to posts page
     */
    public function test_ui_header_has_link_to_posts_page(): void
    {
        $this->blade('<x-ui.layout.header />')->assertSee(route('posts'));
    }

    /**
     * Test Header has link to contact form
     */
    public function test_ui_header_has_link_to_contact_form(): void
    {
        $this->blade('<x-ui.layout.header />')->assertSee('#contact');
    }

    /**
     * Test Header social icons are hidden when empty
     */
    public function test_ui_header_social_icons_are_hidden_when_empty(): void
    {
        Settings::setValue('url_github', '');
        Settings::setValue('url_linkedin', '');
        Settings::setValue('url_youtube', '');

        $this->blade('<x-ui.layout.header />')
            ->assertDontSee('header-icon-github')
            ->assertDontSee('header-icon-linkedin')
            ->assertDontSee('header-icon-youtube');
    }

    /**
     * Test Header has link to Github page
     */
    public function test_ui_header_has_link_to_github_page(): void
    {
        $this->artisan('mjpweb:demosetup');

        $this->blade('<x-ui.layout.header />')->assertSee(Settings::getValue('github_url'));
    }

    /**
     * Test Header has link to Youtube page
     */
    public function test_ui_header_has_link_to_youtube_page(): void
    {
        $this->artisan('mjpweb:demosetup');

        $this->blade('<x-ui.layout.header />')->assertSee(Settings::getValue('youtube_url'));
    }

    /**
     * Test Header has link to Linkedin page
     */
    public function test_ui_header_has_link_to_linkedin_page(): void
    {
        $this->artisan('mjpweb:demosetup');

        $this->blade('<x-ui.layout.header />')->assertSee(Settings::getValue('linkedin_url'));
    }


}

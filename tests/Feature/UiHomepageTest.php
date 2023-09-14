<?php

namespace Tests\Feature;

use App\Facades\Settings;
use App\Facades\Ui\BulletPoints;
use App\Facades\Ui\Posts;
use App\Models\Demo;
use App\Models\Post;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UiHomepageTest extends TestCase
{
    /**
     * Test homepage returns 200
     */
    public function test_homepage_is_ok(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Test homepage title
     */
    public function test_homepage_title_displayed(): void
    {
        $this->artisan('mjpweb:demosetup');

        $response = $this->get('/');

        $text = Settings::getValue('site_name');

        $response->assertSee($text);
    }

    /**
     * Test homepage tagline
     */
    public function test_homepage_tagline_displayed(): void
    {
        $this->artisan('mjpweb:demosetup');

        $response = $this->get('/');

        $text = Settings::getValue('site_tagline');

        $response->assertSee($text);
    }

    /**
     * Test homepage intro
     */
    public function test_homepage_intro_displayed(): void
    {
        $this->artisan('mjpweb:demosetup');

        $text = Settings::getValue('homepage_intro');

        $this->get('/')->assertSee($text);
    }

    /**
     * Test homepage bullets
     */
    public function test_homepage_bullets_displayed(): void
    {
        $this->artisan('mjpweb:demosetup');

        $this->get('/')->assertSeeTextInOrder(
            BulletPoints::getAll()->pluck('name')->toArray()
        );
    }

    /**
     * Test 10 best skills displayed
     */
    public function test_homepage_10_best_skills_displayed(): void
    {
        $this->artisan('mjpweb:demosetup');

        $this->get('/')->assertSeeTextInOrder(
            Skill::active()->orderBy('level', 'desc')->take(10)->pluck('name')->toArray()
        );
    }

    /**
     * Test 2 most recent demos are displayed
     */
    public function test_homepage_2_most_recent_demos_displayed(): void
    {
        $this->artisan('mjpweb:demosetup');

        $this->get('/')->assertSeeTextInOrder(
            Demo::active()->orderBy('created_at', 'desc')->take(2)->pluck('name')->toArray()
        );
    }

    /**
     * Test 2 most recently updated projects are displayed
     */
    public function test_homepage_2_most_recently_updated_projects_displayed(): void
    {
        $this->artisan('mjpweb:demosetup');

        $this->get('/')->assertSeeTextInOrder(
            Project::active()->orderBy('updated_at', 'desc')->take(2)->pluck('name')->toArray()
        );
    }

    /**
     * Test 4 most recent posts are displayed
     *
     * @todo Buggy test...
     */
    public function test_homepage_4_most_recent_posts_displayed(): void
    {
        $this->artisan('mjpweb:demosetup');

        // These two should return the same results.. why don't they?
        // dd(Posts::getFiltered([])->take(4)->pluck('name')->toArray());
        // dd(Posts::getFilteredQuery([])->paginate(4)->pluck('name')->toArray());

        $this->get('/')->assertSeeTextInOrder(
            Posts::getFilteredQuery([])->paginate(4)->pluck('name')->toArray()
        );
    }

    /**
     * Test contact form is displayed
     */
    public function test_homepage_contact_form_displayed(): void
    {
        $this->artisan('mjpweb:demosetup');

        $this->get('/')->assertSee('id="contact-form"', false);
    }

    /**
     * Test jump to random page link is displayed
     */
    public function test_homepage_jump_to_random_page_link_displayed(): void
    {
        $this->artisan('mjpweb:demosetup');

        $this->get('/')->assertSee('id="jump-to-random-page"', false);
    }

}

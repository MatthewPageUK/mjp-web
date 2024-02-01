<?php

namespace Tests\Feature;

use App\Facades\Settings;
use App\Models\Demo;
use App\Models\Post;
use App\Models\Project;
use App\Models\Skill;
use App\Models\SkillLog;
use App\Contracts\BulletPoints;
use App\Services\Ui\PostService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UiHomepageTest extends TestCase
{
    use RefreshDatabase;

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
            app(BulletPoints::class)->getAll()->pluck('name')->toArray()
        );
    }

    /**
     * Test 10 best web development skills displayed
     */
    public function test_homepage_10_best_skills_displayed(): void
    {
        $this->artisan('mjpweb:demosetup');

        $this->get('/')->assertSeeTextInOrder(
            Skill::active()->whereHas('skillGroups', function ($query) {
                return $query->where('name', 'Web Development');
            })->orderBy('level', 'desc')->take(10)->pluck('name')->toArray()
        );
    }

    /**
     * Test 2 most recent demos are displayed
     */
    public function test_homepage_2_most_recent_demos_displayed(): void
    {
        $this->artisan('mjpweb:demosetup');

        $this->get('/')->assertSeeTextInOrder(
            Demo::active()->latest()->take(2)->pluck('name')->toArray()
        );
    }

    /**
     * Test 2 most recently updated projects are displayed
     */
    public function test_homepage_2_most_recently_updated_projects_displayed(): void
    {
        $this->artisan('mjpweb:demosetup');

        $this->get('/')->assertSeeTextInOrder(
            Project::active()->latest('updated_at')->take(2)->pluck('name')->toArray()
        );
    }

    /**
     * Test the journal is displayed
     */
    public function test_homepage_latest_journal_entries_displayed(): void
    {
        // create some skill logs
        $skillLogs = SkillLog::factory(5)->create()->sortByDesc('date');

        // do they appear
        $this->get('/')->assertSeeTextInOrder(
            $skillLogs->pluck('description')->toArray()
        );
    }

    /**
     * Test 4 most recent posts are displayed
     *
     */
    public function test_homepage_4_most_recent_posts_displayed(): void
    {
        $posts = app(PostService::class);

        $this->artisan('mjpweb:demosetup');

        $this->get('/')->assertSeeTextInOrder(
            $posts->getFilteredQuery([])->paginate(4)->pluck('name')->toArray()
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

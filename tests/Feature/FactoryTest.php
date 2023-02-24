<?php

namespace Tests\Feature;

use App\Models\{
    Demo,
    Experience,
    Post,
    PostCategory,
    Project,
    Skill,
    SkillGroup,
};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FactoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Factory tests
     */

    public function test_demo_factory(): void
    {
        $demo = Demo::factory()->create();
        $this->assertModelExists($demo);
    }

    public function test_experience_factory(): void
    {
        $experience = Experience::factory()->create();
        $this->assertModelExists($experience);
    }

    public function test_post_category_factory(): void
    {
        $postCategory = PostCategory::factory()->create();
        $this->assertModelExists($postCategory);
    }

    public function test_post_factory(): void
    {
        $post = Post::factory()->create();
        $this->assertModelExists($post);
    }

    public function test_post_postcategroy_factory(): void
    {
        $post = Post::factory()
            ->hasAttached(PostCategory::factory()->create())
            ->create();
        $this->assertModelExists($post->postCategories->first());
    }

    public function test_project_factory(): void
    {
        $project = Project::factory()->create();
        $this->assertModelExists($project);
    }

    public function test_skill_factory(): void
    {
        $skill = Skill::factory()->create();
        $this->assertModelExists($skill);
    }

    public function test_skill_group_factory(): void
    {
        $skillGroup = SkillGroup::factory()->create();
        $this->assertModelExists($skillGroup);
    }

    public function test_skill_skillgroup_factory(): void
    {
        $skill = Skill::factory()
            ->hasAttached(SkillGroup::factory()->create())
            ->create();
        $this->assertModelExists($skill->skillGroups->first());
    }

    public function test_skillable_factory(): void
    {
        $skill = Skill::factory()
            ->hasAttached(Post::factory()->create())
            ->hasAttached(Demo::factory()->create())
            ->hasAttached(Experience::factory()->create())
            ->hasAttached(Project::factory()->create())
            ->create();
        $this->assertModelExists($skill->posts->first());
        $this->assertModelExists($skill->demos->first());
        $this->assertModelExists($skill->projects->first());
        $this->assertModelExists($skill->experiences->first());
    }

    public function test_postable_factory(): void
    {
        $post = Post::factory()
            ->hasAttached(Demo::factory()->create())
            ->hasAttached(Experience::factory()->create())
            ->hasAttached(Project::factory()->create())
            ->create();
        $this->assertModelExists($post->demos->first());
        $this->assertModelExists($post->projects->first());
        $this->assertModelExists($post->experiences->first());
    }
}

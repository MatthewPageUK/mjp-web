<?php

namespace App\View\Components;

use App\Models\BulletPoint;
use App\Models\Demo;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Skill;
use App\Models\SkillGroup;
use App\Services\SettingService;
use Illuminate\View\{
    Component,
    View,
};

/**
 * CMS Interface / Back End layout
 *
 */
class CmsLayout extends Component
{

    /**
     * Menu items
     *
     * @var array
     */
    public $menu = [];

    /**
     * Construct the UI Layout
     *
     * @param string $title    The page title
     * @return void
     */
    public function __construct(
        public SettingService   $settings,
        public ?string          $title = null,
        public ?string          $routeName = null,
    ) {

        // If we don't have a title, use the site name and tagline
        if (! $this->title) {
            $this->title = sprintf('%s - %s',
                $this->settings->getValue('site_name'),
                $this->settings->getValue('site_tagline')
            );
        }

        // If we don't have a route name, use the current route name
        if (! $this->routeName) {
            $this->routeName = request()->route()->getName();
        }

        $this->prepareMenu();
    }

    /**
     * Prepare the menu items
     *
     * @return void
     */
    public function prepareMenu(): void
    {
        $this->menu['bullets'] = BulletPoint::orderBy('name')->get()->map(function ($item) {
            return (object) [
                'id' => $item->id,
                'name' => $item->name,
            ];
        })->toArray();

        $this->menu['demos'] = Demo::orderBy('name')->get()->map(function ($item) {
            return (object) [
                'id' => $item->id,
                'name' => $item->name,
            ];
        })->toArray();

        $this->menu['posts'] = Post::orderBy('name')->get()->map(function ($item) {
            return (object) [
                'id' => $item->id,
                'name' => $item->name,
            ];
        })->toArray();

        $this->menu['postCategories'] = PostCategory::orderBy('name')->get()->map(function ($item) {
            return (object) [
                'id' => $item->id,
                'name' => $item->name,
            ];
        })->toArray();

        $this->menu['skills'] = Skill::orderBy('name')->get()->map(function ($item) {
            return (object) [
                'id' => $item->id,
                'name' => $item->name,
            ];
        })->toArray();

        $this->menu['skillGroups'] = SkillGroup::orderBy('name')->get()->map(function ($item) {
            return (object) [
                'id' => $item->id,
                'name' => $item->name,
            ];
        })->toArray();
    }


    /**
     * Render the main layout.
     *
     * @return View
     */
    public function render(): View
    {
        return view('layouts.cms');
    }
}

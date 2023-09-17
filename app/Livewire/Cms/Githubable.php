<?php

namespace App\Livewire\Cms;

use Illuminate\View\View;
use Livewire\Component;

/**
 * CMS - Github URL panel for any model
 * with the Githubable traits
 *
 */
class Githubable extends Component
{
    /**
     * The current Githubable model
     *
     * @var mixed
     */
    public $githubable;

    /**
     * The Github URL
     *
     * @var string
     */
    public string|null $url;

    /**
     * The Github owner
     *
     * @var string
     */
    public string|null $owner;

    /**
     * The Github repo name
     *
     * @var string
     */
    public string|null $name;

    /**
     * Validation rules
     *
     * @var array
     */
    protected $rules = [
        'url' => 'required|url',
        'owner' => 'required|string',
        'name' => 'required|string',
    ];

    /**
     * Mount the component
     *
     * @return void
     */
    public function mount(): void
    {
        $this->url = $this->githubable->githubRepo?->url;
        $this->owner = $this->githubable->githubRepo?->owner;
        $this->name = $this->githubable->githubRepo?->name;
    }

    /**
     * Value has been updated
     *
     * @return void
     */
    public function updated(): void
    {
        $this->validate();

        if ($this->githubable->hasGithubRepo()) {
            $this->githubable->githubRepo->update([
                'url' => $this->url,
                'owner' => $this->owner,
                'name' => $this->name,
            ]);
        } else {
            $this->githubable->githubRepo()->create([
                'url' => $this->url,
                'owner' => $this->owner,
                'name' => $this->name,
            ]);
        }
    }

    /**
     * Remove the Github repo
     *
     * @return void
     */
    public function remove(): void
    {
        $this->githubable->githubRepo()->delete();
        $this->url = null;
        $this->owner = null;
        $this->name = null;
    }

    /**
     * Render the Project Selector page
     *
     * @return View
     */
    public function render(): View
    {
        return view('cms.githubable-select');
    }
}

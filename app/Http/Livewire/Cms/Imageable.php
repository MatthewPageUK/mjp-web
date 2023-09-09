<?php

namespace App\Http\Livewire\Cms;

use App\Models\Project;
use Illuminate\View\View;
use Livewire\Component;

/**
 * CMS - Image selection panel for any model
 * with the Imageable traits
 *
 */

class Imageable extends Component
{
    /**
     * The current Imageable model
     *
     * @var Project|Project|
     */
    public $imageable;

    public $imageUrl = '';

    public function mount()
    {
        $this->imageUrl = $this->imageable->image?->url;
    }

    // /**
    //  * Link a project to the current model
    //  *
    //  * @param int $projectId
    //  * @return void
    //  */
    // public function linkProject(int $projectId): void
    // {
    //     $this->projectable->projects()->attach($projectId);
    //     $this->projectable->refresh();
    //     $this->fetchProjects();
    // }

    // /**
    //  * Unlink a project from the current model
    //  *
    //  * @param int $projectId
    //  * @return void
    //  */
    // public function unlinkProject(int $projectId): void
    // {
    //     $this->projectable->projects()->detach($projectId);
    //     $this->projectable->refresh();
    //     $this->fetchProjects();
    // }

    /**
     * URL has been updated
     *
     * @return void
     */
    public function updatedImageUrl()
    {
        if ($this->imageable->hasImage()) {
            $this->imageable->image?->update(['url' => $this->imageUrl]);
        } else {
            $this->imageable->image()->create(['url' => $this->imageUrl]);
        }

//          dd('hey');
    }

    // /**
    //  * Fetch the projects with the current filter
    //  *
    //  * @return void
    //  */
    // public function fetchProjects(): void
    // {
    //     if ($this->filter) {
    //         $this->projects = Project::where('name', 'like', "%{$this->filter}%")
    //             ->whereNotIn('id', $this->projectable->projects->pluck('id'))
    //             ->orderBy('name')
    //             ->limit(5)
    //             ->get();
    //     } else {
    //         $this->projects = [];
    //     }
    // }

    /**
     * Render the Project Selector page
     *
     * @return View
     */
    public function render(): View
    {
        return view('cms.imageable-select');
    }
}

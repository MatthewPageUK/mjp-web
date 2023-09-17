<?php

namespace App\Livewire\Github;

use App\Livewire\Github\Traits\HasGithubRepo;
use Illuminate\View\View;
use Livewire\Component;

/**
 * UI - Github Repo info panel.
 *
 * Shows repo information.
 *
 */
class Info extends Component
{
    use HasGithubRepo;

    /**
     * Render the Github info panel
     *
     * @return View
     */
    public function render(): View
    {
        return view('ui.github.info');
    }

}

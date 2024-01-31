<?php

namespace App\Livewire\Github;

use App\Livewire\Github\Traits\HasGithubRepo;
use GrahamCampbell\GitHub\Facades\GitHub;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use Livewire\Component;

/**
 * UI - Github Repo developer panel.
 *
 * Shows repo information, issues and pull requests.
 *
 */
class Repo extends Component
{
    use HasGithubRepo;

    /**
     * Issues
     *
     * @var array
     */
    public $issues = [];

    /**
     * Open Pull requests
     *
     * @var array
     */
    public $openPullRequests = [];

    /**
     * Closed Pull requests
     *
     * @var array
     */
    public $closedPullRequests = [];

    /**
     * Load the basic repo and extended information from the Github API.
     *
     * @return void
     */
    public function loadRepo()
    {
        try {
            $this->setRepo(
                Cache::remember($this->getCacheKey(), $this->cacheSeconds, function () {
                    return GitHub::connection('main')->repo()->show($this->model->githubRepo->owner, $this->model->githubRepo->name);
                })
            );
        } catch (\Exception $e) {
            $this->error = sprintf('Error getting Github repo - %s', $e->getMessage());
            return;
        }

        try {
            $this->setIssues(
                Cache::remember($this->getCacheKey('issues'), $this->cacheSeconds, function () {
                    return GitHub::connection('main')->issues()->all($this->model->githubRepo->owner, $this->model->githubRepo->name, ['state' => 'open']);
                })
            );

        } catch (\Exception $e) {
            $this->error = sprintf('Error getting Github issues - %s', $e->getMessage());
            return;
        }

        try {
            $this->setOpenPullRequests(
                Cache::remember($this->getCacheKey('pr-open'), $this->cacheSeconds, function () {
                    return GitHub::connection('main')->pull_requests()->all(
                        $this->model->githubRepo->owner,
                        $this->model->githubRepo->name,
                        ['state' => 'open']
                    );
                })
            );

            $this->setClosedPullRequests(
                Cache::remember($this->getCacheKey('pr-all'), $this->cacheSeconds, function () {
                    return GitHub::connection('main')->pull_requests()->all($this->model->githubRepo->owner, $this->model->githubRepo->name, ['state' => 'closed']);
                })
            );

        } catch (\Exception $e) {
            $this->error = sprintf('Error getting Github pull requests - %s', $e->getMessage());
            return;
        }
    }

    /**
     * Set the open pull requests
     *
     * @param array $pullRequests
     * @return void
     */
    public function setOpenPullRequests(array $pullRequests)
    {
        // @todo map out fields not needed
        $this->openPullRequests = $pullRequests;
    }

    /**
     * Set the closed pull requests
     *
     * @param array $pullRequests
     * @return void
     */
    public function setClosedPullRequests(array $pullRequests)
    {
        // @todo map out stuff
        $this->closedPullRequests = $pullRequests;
    }

    /**
     * Set the issues array
     *
     * @param array $issues
     * @return void
     */
    public function setIssues(array $issues)
    {
        // @todo map out fields not needed
        $this->issues = $issues;
    }

    /**
     * Render the Github repo panel
     *
     * @return View
     */
    public function render(): View
    {
        return view('ui.github.repo');
    }

}

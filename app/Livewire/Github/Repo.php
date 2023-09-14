<?php

namespace App\Livewire\Github;

use App\Models\Project;
use Carbon\Carbon;
use GrahamCampbell\GitHub\Facades\GitHub;
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

    /**
     * Repo home URL
     *
     * @var string
     */
    public $urlHome = '';

    /**
     * Repo clone URL
     *
     * @var string
     */
    public $urlClone = '';

    /**
     * Stars achieved
     *
     * @var int
     */
    public $stars = 0;

    /**
     * Watchers
     *
     * @var int
     */
    public $watchers = 0;

    /**
     * Created diff
     *
     * @var string
     */
    public $created = '';

    /**
     * Updated diff
     *
     * @var string
     */
    public $updated = '';

    /**
     * Pushed diff
     *
     * @var string
     */
    public $pushed = '';

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
     * Error message
     *
     * @var string|null
     */
    public ?string $error = null;

    /**
     * The project
     *
     * @var Project
     */
    public Project $project;

    /**
     * Mount the component
     *
     * @param Project $project
     * @return void
     */
    public function mount(Project $project)
    {
        $this->project = $project;

    }

    public function loadRepo()
    {
        try {
            $this->setRepo(
                GitHub::connection('main')->repo()->show($this->project->githubOwner, $this->project->githubRepo)
            );

        } catch (\Exception $e) {
            $this->error = sprintf('Error getting Github repo - %s', $e->getMessage());
            return;
        }

        try {
            $this->setIssues(
                GitHub::connection('main')->issues()->all($this->project->githubOwner, $this->project->githubRepo, array('state' => 'open'))
            );

        } catch (\Exception $e) {
            $this->error = sprintf('Error getting Github issues - %s', $e->getMessage());
            return;
        }

        try {
            $this->setOpenPullRequests(
                GitHub::connection('main')->pull_requests()->all($this->project->githubOwner, $this->project->githubRepo, array('state' => 'open'))
            );

            $this->setClosedPullRequests(
                GitHub::connection('main')->pull_requests()->all($this->project->githubOwner, $this->project->githubRepo, array('state' => 'closed'))
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
     * Set the repo data
     *
     * @param array $repo
     * @return void
     */
    public function setRepo(array $repo)
    {
        $this->urlHome = $repo['html_url'];
        $this->urlClone = $repo['clone_url'];
        $this->stars = $repo['stargazers_count'];
        $this->watchers = $repo['watchers_count'];
        $this->created = Carbon::parse($repo['created_at'])?->diffForHumans();
        $this->updated = Carbon::parse($repo['updated_at'])?->diffForHumans();
        $this->pushed = Carbon::parse($repo['pushed_at'])?->diffForHumans();
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

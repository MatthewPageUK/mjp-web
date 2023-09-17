<?php

namespace App\Livewire\Github\Traits;

use Carbon\Carbon;
use GrahamCampbell\GitHub\Facades\GitHub;
use Illuminate\Database\Eloquent\Model;

/**
 * Github - has repo trait for loading the basic repo
 * information from the Github API.
 *
 */
trait HasGithubRepo
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
     * Open issues count
     *
     * @var int
     */
    public $openIssues = 0;

    /**
     * Does the repo have issues?
     *
     * @var bool
     */
    public $hasIssues = false;

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
     * Useful links
     *
     * @var array
     */
    public $links = [
        'issues' => '',
        'new_issue' => '',
        'new_bug' => '',
        'new_enhancement' => '',
        'readme' => '',
    ];

    /**
     * Error message
     *
     * @var string|null
     */
    public ?string $error = null;

    /**
     * The githubable model
     *
     * @var Model
     */
    public Model $model;

    /**
     * Mount the component
     *
     * @param Model $model
     * @return void
     */
    public function mountHasGithubRepo(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Load the basic repo information from the Github API.
     *
     * @return void
     */
    public function loadRepo(): void
    {
        try {
            $this->setRepo(
                GitHub::connection('main')->repo()->show($this->model->githubRepo->owner, $this->model->githubRepo->name)
            );

        } catch (\Exception $e) {
            $this->error = sprintf('Error getting Github repo - %s', $e->getMessage());
            return;
        }
    }

    /**
     * Set the repo data from the Github API response.
     *
     * @param array $repo
     * @return void
     */
    public function setRepo(array $repo)
    {
        //dd($repo);
        $this->urlHome = $repo['html_url'];
        $this->urlClone = $repo['clone_url'];
        $this->stars = $repo['stargazers_count'];
        $this->watchers = $repo['watchers_count'];
        $this->openIssues = $repo['open_issues'];
        $this->hasIssues = $this->openIssues > 0;
        $this->created = Carbon::parse($repo['created_at'])?->diffForHumans();
        $this->updated = Carbon::parse($repo['updated_at'])?->diffForHumans();
        $this->pushed = Carbon::parse($repo['pushed_at'])?->diffForHumans();
        $this->links = [
            'issues' => $this->urlHome . '/issues',
            'new_issue' => $this->urlHome . '/issues/new',
            'new_bug' => $this->urlHome . '/issues/new?labels=bug&assignees=' . config('app.github_owner'),
            'new_enhancement' => $this->urlHome . '/issues/new?labels=enhancement&assignees=' . config('app.github_owner'),
            'readme' => $this->urlHome . '/#readme',
        ];
    }
}

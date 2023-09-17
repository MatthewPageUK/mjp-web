<?php

namespace App\Models\Traits;

use App\Models\GithubRepo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * Trait for models with a Github repo.
 *
 */
trait HasGithub
{
    /**
     * Get the model's github repo.
     *
     * @return MorphOne
     */
    public function githubRepo(): MorphOne
    {
        return $this->morphOne(GithubRepo::class, 'githubable');
    }

    /**
     * Does the model have a Github repo ?
     *
     * @return bool
     */
    public function hasGithubRepo(): bool
    {
        return $this->githubRepo()->exists();
    }
}

<?php

namespace App\Models\Traits;

/**
 * Trait for models with a Github URL.
 *
 */
trait HasGithub
{
    /**
     * Get the Github owner from the Github URL
     *
     * eg.
     * https://github.com/MatthewPageUK/mjp-web
     * would return MatthewPageUK
     *
     * @todo Improve this to be more robust
     * @return string
     */
    public function getGithubOwnerAttribute()
    {
        return explode('/', $this->github)[3];
    }

    /**
     * Get the Github repo name from the Github URL
     *
     * eg.
     * https://github.com/MatthewPageUK/mjp-web
     * would return mjp-web
     *
     * @todo Improve this to be more robust
     * @return string
     */
    public function getGithubRepoAttribute(): string
    {
        return explode('/', $this->github)[4];
    }
}

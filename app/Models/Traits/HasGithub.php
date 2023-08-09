<?php

namespace App\Models\Traits;

trait HasGithub
{

    /**
     * Get the Github owner
     *
     * @return string
     */
    public function getGithubOwnerAttribute()
    {
        return explode('/', $this->github)[3];
    }

    /**
     * Get the Github repo
     *
     * @return string
     */
    public function getGithubRepoAttribute(): string
    {
        return explode('/', $this->github)[4];
    }

}
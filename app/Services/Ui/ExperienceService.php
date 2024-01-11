<?php

namespace App\Services\Ui;

use App\Models\Experience;
use App\Services\Traits\HasActiveStatus;
use Illuminate\Database\Eloquent\Collection;

/**
 * UI Service for managing Experiences.
 *
 */
class ExperienceService
{
    use HasActiveStatus;

    /**
     * The model class to use.
     *
     * @var Model
     */
    public $model = Experience::class;

    /**
     * Get a single experience by ID.
     *
     * @param int $id
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     * @return Experience
     */
    public function get(int $id): Experience
    {
        return Experience::findOrFail($id);
    }

    /**
     * Get all experiences
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->getBaseQuery()->with('skills')->latest('start')->get();
    }

    /**
     * Get the next experience
     *
     * @param Experience $experience
     * @return Experience|null
     */
    public function getNext(Experience $experience): ?Experience
    {
        return $this->getBaseQuery()
            ->where('start', '>', $experience->start)
            ->latest('start')
            ->first();
    }

    /**
     * Get the previous experience
     *
     * @param Experience $experience
     * @return Experience|null
     */
    public function getPrevious(Experience $experience): ?Experience
    {
        return $this->getBaseQuery()
            ->where('start', '<', $experience->start)
            ->latest('start')
            ->first();
    }

}

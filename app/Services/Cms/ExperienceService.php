<?php

namespace App\Services\Cms;

use App\Models\Experience;
use Illuminate\Database\Eloquent\Collection;

/**
 * Service for managing Experiences in the CMS.
 *
 */
class ExperienceService
{
    /**
     * Return a new Experience model.
     *
     * @param array $data
     * @return Experience
     */
    public function new(array $data = ['active' => 0]): Experience
    {
        return new Experience($data);
    }

    /**
     * Get a single Experience.
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
     * Get all Experiences.
     *
     * @throws \Exception
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Experience::orderBy('name')
            ->with(['skills', 'posts'])
            ->get();
    }

    /**
     * Create a new Experience.
     *
     * @param array $data
     * @throws \Exception
     * @return Experience
     */
    public function create(array $data): Experience
    {
        return Experience::create($data);
    }

    /**
     * Update an existing Experience and update
     * the order accordingly.
     *
     * @param int $id       The ID of the Experience to update
     * @param array $data   The data to update with
     * @throws \Exception
     * @return void
     */
    public function update($experience): void
    {
        $experience->save();
    }

    /**
     * Delete a Experience.
     *
     * @param int $id
     * @throws \Exception
     * @return void
     */
    public function delete(int $id): void
    {
        $this->get($id)->delete();
    }

}

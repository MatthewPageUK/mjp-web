<?php

namespace App\Services\Cms;

use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;

/**
 * Service for managing Projects in the CMS.
 *
 */
class ProjectService
{
    /**
     * Return a new Project model.
     *
     * @param array $data
     * @return Project
     */
    public function new(array $data = ['active' => 0]): Project
    {
        return new Project($data);
    }

    /**
     * Get a single Project.
     *
     * @param int $id
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     * @return Project
     */
    public function get(int $id): Project
    {
        return Project::findOrFail($id);
    }

    /**
     * Get all Projects.
     *
     * @throws \Exception
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Project::orderBy('name')
            ->with(['skills', 'posts'])
            ->get();
    }

    /**
     * Create a new Project.
     *
     * @param array $data
     * @throws \Exception
     * @return Project
     */
    public function create(array $data): Project
    {
        return Project::create($data);
    }

    /**
     * Update an existing Project and update
     * the order accordingly.
     *
     * @param int $id       The ID of the Project to update
     * @param array $data   The data to update with
     * @throws \Exception
     * @return void
     */
    public function update(int $id, array $data): void
    {
        $Project = $this->get($id);
        $Project->fill($data);
        $Project->save();
    }

    /**
     * Delete a Project.
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

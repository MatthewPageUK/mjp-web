<?php

namespace App\Services\Cms;

use App\Models\Demo;
use Illuminate\Database\Eloquent\Collection;

/**
 * Service for managing Demos in the CMS.
 *
 */
class DemoService
{
    /**
     * Return a new Demo model.
     *
     * @param array $data
     * @return Demo
     */
    public function new(array $data = ['active' => 0]): Demo
    {
        return new Demo($data);
    }

    /**
     * Get a single demo.
     *
     * @param int $id
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     * @return Demo
     */
    public function get(int $id): Demo
    {
        return Demo::findOrFail($id);
    }

    /**
     * Get all demos.
     *
     * @throws \Exception
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Demo::orderBy('name')->get();
    }

    /**
     * Create a new Demo.
     *
     * @param array $data
     * @throws \Exception
     * @return Demo
     */
    public function create(array $data): Demo
    {
        // Create a new model
        return Demo::create($data);
    }

    /**
     * Update an existing Bullet Point and update
     * the order accordingly.
     *
     * @param int $id       The ID of the Bullet Point to update
     * @param array $data   The data to update with
     * @throws \Exception
     * @return void
     */
    public function update(int $id, array $data): void
    {
        $demo = $this->get($id);
        $demo->fill($data);
        $demo->save();
    }

    /**
     * Delete a Demo.
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

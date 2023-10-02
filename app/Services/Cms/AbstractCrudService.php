<?php

namespace App\Services\Cms;

use App\Services\Cms\Traits\{
    WithCreate,
    WithDelete,
    WithUpdate,
};
use Illuminate\Database\Eloquent\{
    Model,
    Collection,
};

/**
 * CMS - Livewire Crud Actions Abstract
 *
 * Provides the basic CRUD actions for the CMS Livewire components.
 *
 */

abstract class AbstractCrudService
{
    use WithCreate;
    use WithUpdate;
    use WithDelete;

    /**
     * The model class to use.
     * eg. App\Models\Product::class
     *
     * @var Model
     */
    protected $model;

    /**
     * Default sort order for the list.
     *
     * @var string
     */
    protected $defaultSort = 'name';

    /**
     * Get the model referenced by the id.
     *
     * @param int $id
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     * @return Model
     */
    public function get(int $id): Model
    {
        return $this->model::findOrFail($id);
    }

    /**
     * Get all models.
     *
     * @throws \Exception
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->model::orderBy($this->defaultSort)->get();
    }

    /**
     * Perform a simple search on the model.
     *
     * @param string    $search   Search string
     * @param int       $perPage  Number of results to return
     * @param string    $field    Field name to search on
     * @return Collection
     */
    public function simpleSearch(
        string $search,
        int $perPage = 5,
        string $field = 'name'
    ): Collection
    {
        return $this->model::where($field, 'like', '%'.$search.'%')
            ->orderBy($field)
            ->limit($perPage)
            ->get();
    }

}

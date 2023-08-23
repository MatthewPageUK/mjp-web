<?php

namespace App\Services\Cms\Traits;

use Illuminate\Database\Eloquent\Model;

trait WithCreate
{
    /**
     * Return a new model populated with the optional
     * data provided in the array.
     *
     * @param array $data
     * @return Model
     */
    public function new(array $data = []): Model
    {
        return new $this->model($data);
    }

    /**
     * Create a new model and save to the database.
     *
     * @param array $data
     * @throws \Exception
     * @return Model
     */
    public function create(array $data): Model
    {
        // Create a new model
        $model = new $this->model($data);

        // Before create hook
        $model = $this->beforeCreate($model);

        // Save it
        $model->save();

        // After create hook
        $model = $this->afterCreate($model);

        return $model;
    }

    /**
     * Before create hook
     *
     * @param Model $model
     * @return Model
     */
    public function beforeCreate(Model $model): Model
    {
        return $model;
    }

    /**
     * After delete hook
     *
     * @param Model $model
     * @return Model
     */
    public function afterCreate(Model $model): Model
    {
        return $model;
    }

}
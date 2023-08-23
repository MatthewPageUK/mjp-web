<?php

namespace App\Services\Cms\Traits;

use Illuminate\Database\Eloquent\Model;

trait WithDelete
{
    /**
     * Delete a model.
     *
     * @param int $id
     * @throws \Exception
     * @return Model
     */
    public function delete(int $id): Model
    {
        // Get the model
        $model = $this->get($id);

        // Before deleting hook
        $model = $this->beforeDelete($model);

        // Delete it
        $model->delete();

        // After deleting hook
        $model = $this->afterDelete($model);

        return $model;
    }

    /**
     * Before delete hook
     *
     * @param Model $model
     * @return Model
     */
    public function beforeDelete(Model $model): Model
    {
        return $model;
    }

    /**
     * After delete hook
     *
     * @param Model $model
     * @return Model
     */
    public function afterDelete(Model $model): Model
    {
        return $model;
    }

}
<?php

namespace App\Services\Cms\Traits;

use Illuminate\Database\Eloquent\Model;

trait WithUpdate
{
    /**
     * Update a model and save to the database.
     *
     * @param int $id
     * @param array $data
     * @throws \Exception
     * @return Model
     */
    public function update(int $id, array $data): Model
    {
        // Get the model
        $model = $this->get($id);

        // Before updating hook
        $model = $this->beforeUpdate($model);

        // Update values
        $model->fill($data);
        $model->save();

        // After updating hook
        $model = $this->afterUpdate($model);

        return $model;
    }

    /**
     * Before update hook
     *
     * @param Model $model
     * @return Model
     */
    public function beforeUpdate(Model $model): Model
    {
        return $model;
    }

    /**
     * After update hook
     *
     * @param Model $model
     * @return Model
     */
    public function afterUpdate(Model $model): Model
    {
        return $model;
    }

}
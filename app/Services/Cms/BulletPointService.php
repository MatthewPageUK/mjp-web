<?php

namespace App\Services\Cms;

use App\Models\BulletPoint;
use App\Services\Traits\WithRainbow;
use Illuminate\Database\Eloquent\{
    Collection,
    Model,
};

/**
 * CMS - Bullet Point Service.
 *
 * Service for managing Bullet Points in the CMS.
 * Standard CRUD features and re-ordering.
 *
 */
class BulletPointService extends AbstractCrudService
{
    use WithRainbow;

    /**
     * The model class to use.
     *
     * @var Model
     */
    protected $model = BulletPoint::class;

    /**
     * Default sort order for the list.
     *
     * @var string
     */
    protected $defaultSort = 'order';

    /**
     * Get all bullet points with a rainbow colour.
     *
     * @throws \Exception
     * @return Collection
     */
    public function getAllWithColour(): Collection
    {
        // Get the bullets and attach a colour to each in sequence
        $bulletPoints = $this->getAll()->map(function ($bulletPoint) {
            $bulletPoint->colour = $this->getNextColour();
            return $bulletPoint;
        });

        // Reset the colour sequence
        $this->resetColour();

        // Return the bullet points with colours
        return $bulletPoints;
    }

    /**
     * Re-order the bullets after creating a new one.
     *
     * @param Model $model
     * @throws \Exception
     * @return Model
     */
    public function afterCreate(Model $model): Model
    {
        $bullets = $this->getAll();

        if ($model->order === 0) {

            // At the start, prepend it
            $bullets = $bullets->prepend($model);
        } else {

            /**
             * In the middle, slice and dice the collection
             * to insert new bullet point in the correct
             * position.
             */
            $bullets = $bullets->slice(0, $model->order)
                ->push($model)
                ->concat($bullets->slice($model->order + 1));
        }

        // Save the new order the bullet points
        $this->reorder($bullets);

        // Return the new bullet point
        return $this->get($model->id);
    }

    /**
     * After update hook - re-order the bullet points.
     *
     * @param int $id       The ID of the Bullet Point to update
     * @param array $data   The data to update with
     * @throws \Exception
     * @return BulletPoint
     */
    public function afterUpdate(Model $model): Model
    {
        $this->reorder();
        return $this->get($model->id);
    }

    /**
     * After deleting hook - re-order the remaining
     * bullet points, removing the space left.
     *
     * @param int $id
     * @throws \Exception
     * @return Model
     */
    public function afterDelete(Model $model): Model
    {
        $this->reorder();
        return $model;
    }

    /**
     * Move a Bullet Point up one position.
     *
     * @param int $id
     * @throws \Exception
     * @return void
     */
    public function moveUp(int $id): void
    {
        // Get the Bullet Point
        $bullet = $this->get($id);

        // At the top already
        if ($bullet->order === 0) {
            return;
        }

        // Get all the bullet points
        $bullets = $this->getAll();

        // Slice and dice the collection to move the bullet point
        $bullets = $bullets->slice(0, $bullet->order - 1)
            ->push($bullet)
            ->push($bullets[$bullet->order - 1])
            ->concat($bullets->slice($bullet->order + 1));

        // Save the new order
        $this->reorder($bullets);
    }

    /**
     * Move a Bullet Point down one position.
     *
     * @param int $id
     * @throws \Exception
     * @return void
     */
    public function moveDown(int $id): void
    {
        $bullet = $this->get($id);

        // At the bottom already
        if ($bullet->order === $this->getAll()->count() - 1) {
            return;
        }

        $bullets = $this->getAll();

        // Slice and dice the collection
        $bullets = $bullets->slice(0, $bullet->order)
            ->push($bullets[$bullet->order + 1])
            ->push($bullet)
            ->concat($bullets->slice($bullet->order + 2));

        $this->reorder($bullets);
    }

    /**
     * Re-assign the order value for all the
     * bullet points in the collection or
     * from the DB if not provided.
     *
     * @param Collection|null $bullets
     * @return void
     */
    public function reorder(Collection|null $bullets = null): void
    {
        if (! $bullets) {
            $bullets = $this->getAll();
        }

        $order = 0;
        /**
         * Save a new order for all bullet points based
         * on the current order in the collection. This
         * will remove duplicate order values and fill
         * gaps left by deleting.
         */
        foreach ($bullets as $bullet) {
            $bullet->order = $order;
            $bullet->save();
            $order++;
        }
    }

}

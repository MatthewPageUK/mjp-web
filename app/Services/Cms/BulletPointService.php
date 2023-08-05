<?php

namespace App\Services\Cms;

use App\Models\BulletPoint;
use App\Services\Traits\WithRainbow;
use Illuminate\Database\Eloquent\Collection;

/**
 * Service for managing Bullet Points in the CMS.
 *
 */
class BulletPointService
{
    use WithRainbow;

    /**
     * Return a new BulletPoint model.
     *
     * @param array $data
     * @return BulletPoint
     */
    public function new(array $data = []): BulletPoint
    {
        return new BulletPoint($data);
    }

    /**
     * Get a single bullet point.
     *
     * @param int $id
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     * @return BulletPoint
     */
    public function get(int $id): BulletPoint
    {
        return BulletPoint::findOrFail($id);
    }

    /**
     * Get all bullet points.
     *
     * @throws \Exception
     * @return Collection
     */
    public function getAll(): Collection
    {
        return BulletPoint::orderBy('order')->get();
    }

    /**
     * Get all bullet points with a rainbow colour.
     *
     * @throws \Exception
     * @return Collection
     */
    public function getAllWithColour(): Collection
    {
        //$bulletPoints = $this->getAll();

        $bulletPoints = $this->getAll()->map(function ($bulletPoint) {
            $bulletPoint->colour = $this->getNextColour();
            return $bulletPoint;
        });

        $this->resetColour();

        return $bulletPoints;
    }

    /**
     * Create a new Bullet Point insering it into
     * the correct position and updating the order
     * for all bullet points.
     *
     * @param array $data
     * @throws \Exception
     * @return BulletPoint
     */
    public function create(array $data): BulletPoint
    {
        $bullets = $this->getAll();

        // Create a new model
        $bullet = BulletPoint::create([
            'name' => $data['name'],
            'order' => $data['order'],
        ]);

        if ($data['order'] === 0) {

            // At the start, prepend it
            $bullets = $bullets->prepend($bullet);
        } else {

            // In the middle, slice and dice the collection
            $bullets = $bullets->slice(0, $data['order'])
                ->push($bullet)
                ->concat($bullets->slice($data['order'] + 1));
        }

        // Save the new order
        $this->reorder($bullets);

        return $bullet;
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
        $bullet = BulletPoint::findOrFail($id);

        $bullet->name = $data['name'];
        $bullet->order = $data['order'];

        $bullet->save();

        $this->reorder();
    }

    /**
     * Delete a Bullet Point and update the order
     * of the others.
     *
     * @param int $id
     * @throws \Exception
     * @return void
     */
    public function delete(int $id): void
    {
        $bullet = $this->get($id)->delete();
        $this->reorder();
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
        $bullet = $this->get($id);

        // At the top already
        if ($bullet->order === 0) {
            return;
        }

        $bullets = $this->getAll();

        // Slice and dice the collection
        $bullets = $bullets->slice(0, $bullet->order - 1)
            ->push($bullet)
            ->push($bullets[$bullet->order - 1])
            ->concat($bullets->slice($bullet->order + 1));

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
        foreach ($bullets as $bullet) {
            $bullet->order = $order;
            $bullet->save();
            $order++;
        }
    }

}

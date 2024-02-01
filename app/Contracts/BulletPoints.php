<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;

/**
 * UI - Bullet Point Service.
 *
 * Service for managing Bullet Points in the
 * frontend web site.
 *
 * @method Collection getAll()
 * @method Collection getAllWithRainbow()
 */
interface BulletPoints
{
    /**
     * Get all bullet points in order.
     *
     * @return Collection
     */
    public function getAll(): Collection;

    /**
     * Get all bullet points in order with a rainbow colour
     * attached as $model->colour.
     *
     * @return Collection
     */
    public function getAllWithRainbow(): Collection;

}
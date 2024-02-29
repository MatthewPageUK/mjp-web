<?php

namespace App\Models\Traits;

use App\Models\Cv;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

/**
 * Trait for models with cvs via the cvables pivot table.
 *
 */
trait HasCvs
{
    /**
     * CVs related to this model
     *
     * @return Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function cvs(): MorphToMany
    {
        return $this->morphToMany(Cv::class, 'cvable')
            ->withPivot(['order', 'tag']);
    }
}

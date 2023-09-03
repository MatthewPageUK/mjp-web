<?php

namespace App\Models\Traits;

use App\Models\Skill;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

/**
 * Trait for models with skills via the skillable pivot table.
 *
 */
trait HasSkills
{
    /**
     * Skills related to this model
     *
     * @return Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function skills(): MorphToMany
    {
        return $this->morphToMany(Skill::class, 'skillable');
    }
}

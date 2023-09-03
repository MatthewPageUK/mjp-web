<?php

namespace App\Models\Traits;

use App\Models\Post;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

/**
 * Trait for models with posts via the postable pivot table.
 *
 */
trait HasPosts
{
    /**
     * Posts related to this model
     *
     * @return Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function posts(): MorphToMany
    {
        return $this->morphToMany(Post::class, 'postable');
    }
}

<?php

namespace App\Models\Traits;

use App\Models\Image;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * Trait for models with an image.
 *
 */
trait HasImage
{

    /**
     * Get the model's image.
     *
     * @return MorphOne
     */
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * Get the image URL attribute
     *
     * @return string|null
     */
    public function getImageUrlAttribute(): ?string
    {
        if ($this->hasImage()) {
            return $this->image->url;
        }

        return null;
    }

    /**
     * Does the model have an image ?
     *
     * @return bool
     */
    public function hasImage(): bool
    {
        // @WIP - review this
        if ($this->relationLoaded('image'))
            return $this->image !== null;

        return false;
    }

}

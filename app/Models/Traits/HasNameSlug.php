<?php

namespace App\Models\Traits;

use Illuminate\Support\Str;

trait HasNameSlug
{
    /**
     * Update the slug when the name is updated
     *
     * @param string $value
     * @return void
     */
    public function setNameAttribute($value): void
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    /**
     * Use the slug as a route key name for this model
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
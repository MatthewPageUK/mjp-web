<?php

namespace App\Models\Traits;

use Illuminate\Support\Str;

trait HasTitleSlug
{
    /**
     * Update the slug when the title is updated
     *
     * @param string $value
     * @return void
     */
    public function setTitleAttribute($value): void
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
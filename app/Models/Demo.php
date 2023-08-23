<?php

namespace App\Models;

use App\Models\Traits\{
    HasActive,
    HasNameSlug,
    HasPosts,
    HasSkills,
};
use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes,
    Factories\HasFactory,
};
use Illuminate\Routing\Exceptions\UrlGenerationException;
use Illuminate\Support\Str;

class Demo extends Model
{
    use HasActive;
    use HasFactory;
    use HasNameSlug;
    use HasPosts;
    use HasSkills;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'url',
        'demo_url',
        'active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        //'active' => 'boolean',
    ];

    /**
     * Get the demo's snippet
     *
     * @return string
     */
    public function getSnippetAttribute()
    {
        return Str::words($this->description, 10, '...');
    }

    /**
     * Get the demo page url
     *
     * @return string
     */
    public function getUrlAttribute()
    {
        try {
            return route('demo', ['demo' => $this]);
        } catch (UrlGenerationException $e) {
            return '';
        }
    }

}

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

class Experience extends Model
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
        'start',
        'end',
        'name',
        'description',
        'key_points',
        'active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        // 'active' => 'boolean',
        'start' => 'datetime:Y-m-d',
        'end' => 'datetime:Y-m-d',
        'key_points' => 'array',
    ];

    /**
     * Get the experience page route url
     *
     * @return string
     */
    public function getRouteUrlAttribute()
    {
        try {
            return route('experience', ['experience' => $this]);
        } catch (UrlGenerationException $e) {
            return '';
        }
    }

}

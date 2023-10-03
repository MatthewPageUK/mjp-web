<?php

namespace App\Models;

use App\Models\Traits\{
    HasActive,
    HasImage,
    HasNameSlug,
    HasPosts,
    HasSkills,
};
use Illuminate\Database\Eloquent\{
    Factories\HasFactory,
    Model,
    SoftDeletes,
};
use Illuminate\Routing\Exceptions\UrlGenerationException;

class Experience extends Model
{
    use HasActive;
    use HasFactory;
    use HasImage;
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
        'active',
        'description',
        'end',
        'key_points',
        'name',
        'start',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'end' => 'datetime:Y-m-d',
        'key_points' => 'array',
        'start' => 'datetime:Y-m-d',
    ];

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        // Deleting hook
        static::deleting(function (Experience $experience) {

            // Remove from posts
            $experience->posts()->detach();

            // Remove from skills
            $experience->skills()->detach();

            // Delete image
            $experience->image()->delete();

        });
    }

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

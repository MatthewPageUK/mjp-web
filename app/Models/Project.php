<?php

namespace App\Models;

use App\Interfaces\RouteableModel;
use App\Models\Traits\{
    HasActive,
    HasGithub,
    HasImage,
    HasNameSlug,
    HasPosts,
    HasSkills,
};
use Carbon\Carbon;
use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes,
    Factories\HasFactory,
};
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Routing\Exceptions\UrlGenerationException;

class Project extends Model implements RouteableModel
{
    use HasActive;
    use HasFactory;
    use HasGithub;
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
        'name',
        'slug',
        'description',
        'website',
        'last_active',
        'active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'last_active' => 'datetime',
    ];

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        // Deleting hook
        static::deleting(function (Project $project) {

            // Remove from posts
            $project->posts()->detach();

            // Remove from skills
            $project->skills()->detach();

            // Delete Github repos
            $project->githubRepo()->delete();

            // Delete post image
            $project->image()->delete();

        });
    }

    /**
     * Get the last active attribute
     *
     * @todo Is this needed?
     *
     * @return Attribute
     */
    public function lastActive(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->format('Y-m-d'),
        );
    }

    /**
     * Get the project page route url
     *
     * @return string
     */
    public function getRouteUrlAttribute(): string
    {
        try {
            return route('project', ['project' => $this]);
        } catch (UrlGenerationException $e) {
            return '';
        }
    }

}

<?php

namespace App\Models;

use App\Interfaces\CanBeJournalEntry;
use App\Interfaces\RouteableModel;
use App\Models\Traits\{
    HasActive,
    HasGithub,
    HasImage,
    HasNameSlug,
    HasPosts,
    HasSkills,
    IsJournable,
};
use Illuminate\Database\Eloquent\{
    Factories\HasFactory,
    Model,
    SoftDeletes,
};
use Illuminate\Routing\Exceptions\UrlGenerationException;

class Demo extends Model implements RouteableModel, CanBeJournalEntry
{
    use HasActive;
    use HasFactory;
    use HasGithub;
    use HasImage;
    use HasNameSlug;
    use HasPosts;
    use HasSkills;
    use SoftDeletes;
    use IsJournable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'active',
        'demo_url',
        'description',
        'name',
        'slug',
        'url',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        // Deleting hook
        static::deleting(function (Demo $demo) {

            // Remove posts
            $demo->posts()->detach();

            // Remove from skills
            $demo->skills()->detach();

            // Delete Github repos
            $demo->githubRepo()->delete();

            // Delete image
            $demo->image()->delete();

        });
    }

    /**
     * Get the demo page route url
     *
     * @return string
     */
    public function getRouteUrlAttribute(): string
    {
        try {
            return route('demo', ['demo' => $this]);

        } catch (UrlGenerationException $e) {
            // @todo: Log error
            return '';
        }
    }

}

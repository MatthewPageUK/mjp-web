<?php

namespace App\Models;

use App\Models\Traits\HasNameSlug;
use Illuminate\Database\Eloquent\{
    Builder,
    Model,
    SoftDeletes,
    Factories\HasFactory,
    Relations\BelongsToMany,
};
use Illuminate\Routing\Exceptions\UrlGenerationException;

class PostCategory extends Model
{
    use HasFactory;
    use HasNameSlug;
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'post_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        // Deleting hook
        static::deleting(function (PostCategory $postCategory) {

            // Remove posts
            $postCategory->posts()->detach();

        });
    }

    /**
     * Posts in this category
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }

    /**
     * Get the post category page route url
     *
     * @return string
     */
    public function getRouteUrlAttribute()
    {
        try {
            return route('posts.category', [
                'category' => $this
            ]);
        } catch (UrlGenerationException $e) {
            return '';
        }
    }

    /**
     * Active scope
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query): Builder
    {
        return $query;
    }
}

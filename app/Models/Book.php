<?php

namespace App\Models;

use App\Interfaces\RouteableModel;
use App\Models\Traits\{
    HasDuration,
    HasImage,
    HasNameSlug,
    HasSkills,
};
use Illuminate\Database\Eloquent\{
    Factories\HasFactory,
    Model,
    Relations\HasMany,
};
use Illuminate\Routing\Exceptions\UrlGenerationException;
use Illuminate\Support\Str;

class Book extends Model implements RouteableModel
{
    use HasFactory;
    use HasImage;
    use HasNameSlug;
    use HasSkills;
    use HasDuration;

    protected $fillable = [
        'name',
        'slug',
        'tagline',
        'author',
        'isbn',
        'publisher',
        'first_published',
        'published',
        'read_count',
        'notes',
    ];

    protected $casts = [
        'first_published' => 'date',
        'published' => 'date',
    ];

    /**
     * Reading sessions of this book
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function readings(): HasMany
    {
        return $this->hasMany(Reading::class);
    }

    /**
     * Get the total reading time of this book
     * Returns a string '34 minutes' / '2.4 hours'
     *
     * @return string
     */
    public function getReadingTimeAttribute(): string
    {
        $this->minutes = $this->readings->sum('minutes');

        return $this->duration;

    }

    /**
     * Get the route url for this model
     *
     * @return string
     */
    public function getRouteUrlAttribute(): string
    {
        try {
            return route('library.book', ['book' => $this]);
        } catch (UrlGenerationException $e) {
            return '';
        }
    }

    /**
     * Scope to unread books
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUnread($query)
    {
        return $query
            ->doesntHave('readings')
            ->where('read_count', 0);
    }

    /**
     * Scope to unfinished books
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUnfinished($query)
    {
        return $query
            ->whereHas('readings')
            ->where('read_count', 0);
    }

    /**
     * Scope to recently read books
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeRecentlyRead($query)
    {
        return $query
            ->whereHas('readings')
            ;
    }

}

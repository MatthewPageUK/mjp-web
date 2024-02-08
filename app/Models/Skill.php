<?php

namespace App\Models;

use App\Enums\SkillLevel;
use App\Interfaces\RouteableModel;
use App\Models\Traits\{
    HasActive,
    HasNameSlug,
    HasImage,
};
use Carbon\Carbon;
use Illuminate\Database\Eloquent\{
    Builder,
    Model,
    SoftDeletes,
    Factories\HasFactory,
    Relations\BelongsToMany,
    Relations\HasMany,
    Relations\MorphToMany,
};
use Illuminate\Routing\Exceptions\UrlGenerationException;

class Skill extends Model implements RouteableModel
{
    use HasActive;
    use HasFactory;
    use HasImage;
    use HasNameSlug;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'active',
        'description',
        'level',
        'name',
        'parent_id',
        'slug',
        'svg',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'level' => SkillLevel::class,
        //'active' => 'boolean',
    ];

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        // Deleting hook
        static::deleting(function (Skill $skill) {

            // Remove from categories
            $skill->skillGroups()->detach();

            // Remove from demos
            $skill->demos()->detach();

            // Remove from projects
            $skill->projects()->detach();

            // Remove from experiences
            $skill->experiences()->detach();

            // Remove from posts
            $skill->posts()->detach();

            // Delete skill journeys
            $skill->skillJourneys()->delete();

            // Delete skill logs
            $skill->skillLogs()->delete();

            // Delete skill image
            $skill->image()->delete();

            // @todo

        });
    }

    /**
     * Additional stats attached to this skill such as last used, monthly usage, etc.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stats(): HasMany
    {
        return $this->hasMany(SkillStat::class);
    }

    /**
     * Skill log entries for this skill
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function skillLogs(): MorphToMany
    {
        return $this->morphedByMany(SkillLog::class, 'skillable')
            ->latest('date');
    }

    /**
     * Skill Journeys
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function skillJourneys(): HasMany
    {
        return $this->hasMany(SkillJourney::class)
            ->latest();
    }

    /**
     * Groups this skill is in.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function skillGroups(): BelongsToMany
    {
        return $this->belongsToMany(SkillGroup::class);
    }

    /**
     * Posts about this Skill
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function posts(): MorphToMany
    {
        return $this->morphedByMany(Post::class, 'skillable');
    }

    /**
     * Projects using this Skill
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function projects(): MorphToMany
    {
        return $this->morphedByMany(Project::class, 'skillable');
    }

    /**
     * Demos using this Skill
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function demos(): MorphToMany
    {
        return $this->morphedByMany(Demo::class, 'skillable');
    }

    /**
     * Experience related to this Skill
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function experiences(): MorphToMany
    {
        return $this->morphedByMany(Experience::class, 'skillable');
    }

    /**
     * Books about this skill
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function books(): MorphToMany
    {
        return $this->morphedByMany(Book::class, 'skillable');
    }

    /**
     * Get the number of reading sessions for books in this skill.
     *
     * @return int
     */
    public function getReadingsCountAttribute(): int
    {
        return $this->books->reduce(function ($total, $book) {
            return $total + $book->readings->count();
        }, 0);
    }

    /**
     * Get the last used attribute from the stats
     *
     * @return Carbon
     */
    public function getLastUsedAttribute(): Carbon
    {
        return Carbon::parse($this->stats->where('key', 'last_used')->first()?->value) ?? Carbon::now()->subYears(10);
    }

    /**
     * Scope the query to only include skills within the specified group.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $group
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeInGroup(Builder $query, string $group): Builder
    {
        return $query->whereHas('skillGroups', function ($query) use ($group) {
            $query->where('slug', $group);
        });
    }


    public function scopeOrderByLastUsedStat(Builder $query): Builder
    {
        return $query->orderBy(
            SkillStat::query()
                ->select('value')
                ->whereColumn('skill_id', 'skills.id')
                ->where('key', 'last_used')
                ->limit(1),
            'desc'
        );
    }

    /**
     * Get the skill page route url
     *
     * @return string
     */
    public function getRouteUrlAttribute(): string
    {
        try {
            return route('skill', ['skill' => $this]);
        } catch (UrlGenerationException $e) {
            return '';
        }
    }

}

<?php

namespace App\Models;

use App\Models\Traits\{
    HasActive,
    HasNameSlug,
};
use Illuminate\Database\Eloquent\{
    Builder,
    Model,
    SoftDeletes,
    Factories\HasFactory,
    Relations\BelongsToMany,
    Relations\MorphToMany,
};

class Skill extends Model
{
    use HasActive;
    use HasFactory;
    use HasNameSlug;
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
        'level',
        'svg',
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

        });
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

    /**
     * Get the experience page url
     *
     * @return string
     */
    public function getUrlAttribute(): string
    {
        return route('skill', ['skill' => $this]);
    }

    /**
     * Get the image attribute
     *
     * @return string
     */
    public function getImageAttribute()
    {
        return 'https://loremflickr.com/640/360/technology,'.urlencode($this->slug).'?r='.rand(100,100000).'&lock=1834873'.$this->id;

        // return asset('images/posts/' . $this->slug . '.jpg');
    }
}

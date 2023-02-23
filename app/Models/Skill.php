<?php

namespace App\Models;

use App\Models\Traits\{
    HasActive,
    HasNameSlug,
};
use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes,
    Factories\HasFactory,
    Relations\BelongsToMany,
    Relations\MorphToMany,
};

class Skill extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasNameSlug;
    use HasActive;

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
        'active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'active' => 'boolean',
    ];

    /**
     * Skill groups
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function skillGroups(): BelongsToMany
    {
        return $this->belongsToMany(SkillGroup::class);
    }

    /**
     * Posts related to this Skill
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function posts(): MorphToMany
    {
        return $this->morphedByMany(Post::class, 'skillable');
    }

    /**
     * Projects related to this Skill
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function projects(): MorphToMany
    {
        return $this->morphedByMany(Project::class, 'skillable');
    }

    /**
     * Demos related to this Skill
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
    public function experience(): MorphToMany
    {
        return $this->morphedByMany(Experience::class, 'skillable');
    }

}

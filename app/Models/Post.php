<?php

namespace App\Models;

use App\Models\Traits\{
    HasActive,
    HasSkills,
    HasNameSlug,
};
use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes,
    Factories\HasFactory,
    Relations\BelongsToMany,
    Relations\MorphToMany,
};

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasNameSlug;
    use HasSkills;
    use HasActive;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'snippet',
        'content',
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
     * The post category
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function postCategories(): BelongsToMany
    {
        return $this->belongsToMany(PostCategory::class);
    }

    /**
     * Demos related to this post
     *
     * @return Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function demos(): MorphToMany
    {
        return $this->morphedByMany(Demo::class, 'postable');
    }

    /**
     * Projects related to this post
     *
     * @return Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function projects(): MorphToMany
    {
        return $this->morphedByMany(Project::class, 'postable');
    }

    /**
     * Experiences related to this post
     *
     * @return Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function experiences(): MorphToMany
    {
        return $this->morphedByMany(Experience::class, 'postable');
    }


}

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
};

class SkillGroup extends Model
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
        'active',
    ];

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        // Deleting hook
        static::deleting(function (SkillGroup $skillGroup) {

            // Detach skills
            $skillGroup->skills()->detach();

        });
    }

    /**
     * Skills in this group
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function skills(): BelongsToMany
    {
        return $this->belongsToMany(Skill::class);
    }
}

<?php

namespace App\Models;

use App\Models\Traits\{
    HasActive,
    HasNameSlug,
    HasPosts,
    HasSkills,
};
use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes,
    Factories\HasFactory,
};

class Project extends Model
{
    use HasActive;
    use HasFactory;
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
        'github',
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
        'active' => 'boolean',
        'last_active' => 'datetime',
    ];

}

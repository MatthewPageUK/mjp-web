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

class Experience extends Model
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
        'start',
        'end',
        'name',
        'description',
        'active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        // 'active' => 'boolean',
        'start' => 'datetime:Y-m-d',
        'end' => 'datetime:Y-m-d',
        'key_points' => 'array',
    ];

}

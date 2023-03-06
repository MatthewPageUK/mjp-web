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
use Illuminate\Support\Str;

class Demo extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasNameSlug;
    use HasSkills;
    use HasPosts;
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
        'url',
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
     * Get the demo's snippet
     *
     * @return string
     */
    public function getSnippetAttribute()
    {
        return Str::words($this->description, 10, '...');
    }

}

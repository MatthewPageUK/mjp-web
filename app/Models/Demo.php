<?php

namespace App\Models;

use App\Models\Traits\{
    HasActive,
    HasGithub,
    HasImage,
    HasNameSlug,
    HasPosts,
    HasSkills,
};
use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes,
    Factories\HasFactory,
};
use Illuminate\Routing\Exceptions\UrlGenerationException;

class Demo extends Model
{
    use HasActive;
    use HasFactory;
    use HasGithub;
    use HasImage;
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
        'url',
        'demo_url',
        'active',
    ];

    /**
     * Get the demo page route url
     *
     * @return string
     */
    public function getRouteUrlAttribute()
    {
        try {
            return route('demo', ['demo' => $this]);
        } catch (UrlGenerationException $e) {
            return '';
        }
    }

}

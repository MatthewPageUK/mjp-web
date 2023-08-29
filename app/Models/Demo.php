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
use Illuminate\Routing\Exceptions\UrlGenerationException;
use Illuminate\Support\Str;

class Demo extends Model
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

    /**
     * Get the image attribute
     *
     * @return string
     */
    public function getImageAttribute()
    {
        return 'https://loremflickr.com/640/360/computer?lock=748373'.$this->id;

        // return asset('images/posts/' . $this->slug . '.jpg');
    }

}

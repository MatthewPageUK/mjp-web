<?php

namespace App\Models;

use App\Models\Traits\HasNameSlug;
use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes,
    Factories\HasFactory,
    Relations\HasMany,
};

class PostCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasNameSlug;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'post_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    /**
     * Posts in this category
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

}

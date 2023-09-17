<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Model,
    Factories\HasFactory,
    Relations\MorphTo,
};

class GithubRepo extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url',
        'owner',
        'name',
    ];

    /**
     * Get the parent githubable model.
     *
     * @return MorphTo
     */
    public function githubable(): MorphTo
    {
        return $this->morphTo();
    }

}

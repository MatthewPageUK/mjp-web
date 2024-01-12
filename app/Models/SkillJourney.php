<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Factories\HasFactory,
    Model,
    Relations\BelongsTo,
};

class SkillJourney extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'completed_at',
        'name',
        'skill_id',
        'created_at',
        'updated_at',
    ];

    /**
     * The skill this journey item belongs to
     *
     * @return BelongsTo
     */
    public function skill(): BelongsTo
    {
        return $this->belongsTo(Skill::class);
    }

    /**
     * Scope a query to only include completed journeys.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeComplete($query)
    {
        return $query->whereNotNull('completed_at');
    }

    /**
     * Scope a query to only include incomplete journeys.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIncomplete($query)
    {
        return $query->whereNull('completed_at');
    }
}

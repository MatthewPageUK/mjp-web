<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Model,
    Factories\HasFactory,
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
        'name',
        'completed_at',
        'skill_id',
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

}

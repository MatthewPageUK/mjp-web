<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Skill stats are used to store additional caluclated values
 * for a skill such as last used, monthly usage, etc.
 *
 * These often require heavy database work to calculate and
 * are stored here to reduce the load on the database.
 *
 * The SkillStatsService is used to calculate and update these.
 */
class SkillStat extends Model
{
    protected $fillable = [
        'skill_id',
        'key',
        'value',
    ];

    /**
     * The parent skill
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function skill(): BelongsTo
    {
        return $this->belongsTo(Skill::class);
    }
}

<?php

namespace App\Models;

use App\Enums\{
    SkillLogLevel,
    SkillLogType,
};
use App\Interfaces\CanBeJournalEntry;
use App\Models\Traits\HasDuration;
use App\Models\Traits\HasSkills;
use App\Models\Traits\IsJournable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillLog extends Model implements CanBeJournalEntry
{
    use HasDuration;
    use HasFactory;
    use HasSkills;
    use IsJournable;

    protected $fillable = [
        'type',
        'level',
        'date',
        'minutes',
        'description',
        'notes',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'type' => SkillLogType::class,
        'level' => SkillLogLevel::class,
        'date' => 'date',
        'journal_date' => 'date',
    ];

    #[\Override]
    public static function getJournalDateField(): string
    {
        return 'date';
    }

    /**
     * Scope a query to only include learning.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLearning($query)
    {
        return $query->where('type', SkillLogType::Learn);
    }

    /**
     * Scope a query to only include use.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUsing($query)
    {
        return $query->where('type', SkillLogType::Use);
    }
}

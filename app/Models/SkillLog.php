<?php

namespace App\Models;

use App\Enums\{
    SkillLogLevel,
    SkillLogType,
};
use App\Interfaces\CanBeJournalEntry;
use App\Models\Traits\HasSkills;
use App\Models\Traits\IsJournable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class SkillLog extends Model implements CanBeJournalEntry
{
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
    ];

    /**
     * Get the duration in hours (rounded to 1 decimal place)
     *
     * @return float
     */
    public function getHoursAttribute(): float
    {
        return round($this->minutes / 60, 1);
    }

    /**
     * Get the duration in hours or minutes depending on the duration
     *
     * @return string
     */
    public function getDurationAttribute(): string
    {
        if ($this->minutes < 60) {
            return $this->minutes . ' minutes';
        }

        return $this->hours . ' hours';
    }

    #[\Override]
    public static function getJournalDateField(): string
    {
        return 'date';
    }

}

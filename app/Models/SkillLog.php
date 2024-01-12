<?php

namespace App\Models;

use App\Enums\{
    SkillLogLevel,
    SkillLogType,
};
use App\Models\Traits\HasSkills;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillLog extends Model
{
    use HasFactory;
    use HasSkills;

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

}

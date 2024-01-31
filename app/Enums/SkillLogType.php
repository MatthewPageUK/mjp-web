<?php

namespace App\Enums;

use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

/**
 * Skill log types.
 *
 */
enum SkillLogType: string implements HasLabel, HasIcon
{
    case Learn = 'learn';
    case Use   = 'use';

    /**
     * Return the values from a Backed Enum as an array.
     *
     * @return array
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    /**
     * Return values and names from a Backed Enum as an array.
     *
     * @return array
     */
    public static function toArray(): array
    {
        return array_column(self::cases(), 'value', 'name');
    }

    public function getLabel(): ?string
    {
        return $this->name;
    }

    public function getIcon(): ?string
    {
        return match($this) {
            self::Learn => 'heroicon-o-book-open',
            self::Use => 'heroicon-o-wrench',
        };
    }

    public function getUiIcon(): ?string
    {
        return match($this) {
            self::Learn => 'school',
            self::Use => 'build',
        };
    }
}
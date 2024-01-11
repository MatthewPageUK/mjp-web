<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

/**
 * Skill log levels.
 *
 */
enum SkillLogLevel: string implements HasLabel
{
    case Basic = 'basic';
    case Intermediate   = 'intermediate';
    case Advanced = 'advanced';

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

}
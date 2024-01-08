<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

/**
 * Setting input types.
 *
 */
enum SkillLevels: int implements HasLabel
{
    case One   = 1;
    case Two   = 2;
    case Three = 3;
    case Four  = 4;
    case Five  = 5;
    case Six   = 6;
    case Seven = 7;
    case Eight = 8;
    case Nine  = 9;
    case Ten   = 10;

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

    public function getGeneralLabel(): ?string
    {
        if ($this->value <= 3) {
            return 'Junior';
        }

        if ($this->value <= 7) {
            return 'Intermediate';
        }

        return 'Senior';
    }
}
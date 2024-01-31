<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

/**
 * Skill levels
 *
 */
enum SkillLevel: int implements HasLabel
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

    /**
     * Get the label for the enum value.
     *
     * @return string|null
     */
    public function getLabel(): ?string
    {
        return $this->name;
    }

    /**
     * Get the generalised label for the enum value.
     *
     * @return string|null
     */
    public function getGeneralLabel(): ?string
    {
        return $this->value <= 3 ? 'Junior' : ( $this->value <= 7 ? 'Intermediate' : 'Senior' );
    }

    /**
     * Get the description for the enum value.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return match($this->getGeneralLabel()) {
            'Junior' => 'I have a basic understanding of the skill and can perform simple tasks.',
            'Intermediate' => 'I have a good understanding of the skill and can perform most tasks.',
            'Senior' => 'I have an advanced understanding of the skill and can perform complex tasks.',
        };
    }
}

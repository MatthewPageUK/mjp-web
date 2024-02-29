<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

/**
 * CV Section Type
 *
 */
enum CvSectionType: string implements HasLabel
{
    case Text = 'text';
    case Experience = 'experience';

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

}

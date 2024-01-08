<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

/**
 * Setting input types.
 *
 */
enum SettingTypes: string implements HasLabel
{
    case String = 'string';
    case Text   = 'text';

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
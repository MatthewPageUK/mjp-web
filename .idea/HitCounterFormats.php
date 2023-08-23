<?php

namespace App\Enums;

/**
 * Hit Counter display formats
 *
 */
enum HitCounterFormats: string
{
    case Decimal = 'dec';
    case Hex = 'hex';
    case Binary = 'bin';
    case Roman = 'rom';

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
}
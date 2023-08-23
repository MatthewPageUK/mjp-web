<?php

namespace App\Enums;

/**
 * Crud Modes
 *
 */
enum CrudModes: string
{
    case Create = 'create';
    case Read   = 'read';
    case Update = 'update';
    case Delete = 'delete';

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
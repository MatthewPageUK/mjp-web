<?php

namespace App\Filament\Resources\Traits;

trait HasNavigationBadgeModelCount
{
    public static function getNavigationBadge(): string
    {
        return static::getModel()::count();
    }
}
<?php

namespace App\Filament\Resources\Traits;

use App\Enums\SkillLevel;
use Filament\Tables;

trait HasSkillLevelColumn
{
    public static function getSkillLevelColumn(): Tables\Columns\Column
    {
        return Tables\Columns\TextColumn::make('level')
            ->badge()
            ->color(function (string $state): string {
                return match(
                    SkillLevel::tryFrom($state)?->getGeneralLabel()
                ) {
                    'Junior' => 'danger',
                    'Intermediate' => 'warning',
                    'Senior' => 'success',
                    default => '',
                };
            });
    }
}
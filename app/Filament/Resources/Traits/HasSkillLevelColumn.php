<?php

namespace App\Filament\Resources\Traits;

use App\Enums\SkillLevels;
use Filament\Tables;

trait HasSkillLevelColumn
{
    public static function getSkillLevelColumn(): Tables\Columns\Column
    {
        return Tables\Columns\TextColumn::make('level')
            ->badge()
            ->color(function (string $state): string {
                return match(
                    SkillLevels::tryFrom($state)?->getGeneralLabel()
                ) {
                    'Junior' => 'danger',
                    'Intermediate' => 'warning',
                    'Senior' => 'success',
                    default => '',
                };
            });
    }
}
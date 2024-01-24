<?php

namespace App\Filament\Resources\Traits;

use App\Enums\SkillLevel;
use Filament\Tables;

trait HasSkillLevelColumn
{
    public static function getSkillLevelColumn(): Tables\Columns\Column
    {
        return Tables\Columns\TextColumn::make('level')
            ->formatStateUsing(function (SkillLevel $state): string {
                return $state->value . ' - ' . $state->getGeneralLabel();
            })
            ->badge()
            ->color(function (SkillLevel $state): string {
                return match(
                    $state->getGeneralLabel()
                ) {
                    'Junior' => 'danger',
                    'Intermediate' => 'warning',
                    'Senior' => 'success',
                    default => '',
                };
            });
    }
}
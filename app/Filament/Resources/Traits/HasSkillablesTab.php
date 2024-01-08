<?php

namespace App\Filament\Resources\Traits;

use Filament\Forms;
use Illuminate\Database\Eloquent\{Builder, Model};

trait HasSkillablesTab
{
    public static function getSkillablesTab(): Forms\Components\Tabs\Tab
    {
        return Forms\Components\Tabs\Tab::make('Skills')
            ->icon('heroicon-o-wrench-screwdriver')
            ->schema([
                Forms\Components\CheckboxList::make('skills')
                    ->relationship('skills', 'name', fn (Builder $query) => $query->with('skillGroups')->orderBy('name'))
                    ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->name} ({$record->skillGroups->first()?->name})")
                    ->searchable()
                    ->columns(3)
                    ->label(false)
                    ->columnSpanFull(),
            ])
            ->badge(fn (?Model $record) => $record?->skills()->count())
            ->badgeColor('success');
    }
}
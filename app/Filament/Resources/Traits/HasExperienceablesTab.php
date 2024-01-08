<?php

namespace App\Filament\Resources\Traits;

use Filament\Forms;
use Illuminate\Database\Eloquent\{Builder, Model};

trait HasExperienceablesTab
{
    public static function getExperienceablesTab(): Forms\Components\Tabs\Tab
    {
        return Forms\Components\Tabs\Tab::make('Experience')
            ->icon('heroicon-o-rocket-launch')
            ->schema([
                Forms\Components\CheckboxList::make('experiences')
                    ->columnSpanFull()
                    ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->name} : {$record->start->format('F Y')} - {$record->end->format('F Y')}")
                    ->nullable()
                    ->relationship('experiences', 'name'),
            ])
            ->badge(fn (?Model $record) => $record?->experiences()->count())
            ->badgeColor('success');
    }
}
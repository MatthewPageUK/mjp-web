<?php

namespace App\Filament\Resources\Traits;

use Filament\Forms;
use Illuminate\Database\Eloquent\{Builder, Model};

trait HasProjectablesTab
{
    public static function getProjectablesTab(): Forms\Components\Tabs\Tab
    {
        return Forms\Components\Tabs\Tab::make('Projects')
            ->icon('heroicon-o-rocket-launch')
            ->schema([
                Forms\Components\Select::make('projects')
                    ->multiple()
                    ->relationship('projects', 'name')
                    ->searchable()
                    ->nullable()
                    ->columnSpanFull(),
            ])
            ->badge(fn (?Model $record) => $record?->projects()->count())
            ->badgeColor('success');
    }
}
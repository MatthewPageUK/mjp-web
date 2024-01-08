<?php

namespace App\Filament\Resources\Traits;

use Filament\Forms;
use Illuminate\Database\Eloquent\{Builder, Model};

trait HasDemoablesTab
{
    public static function getDemoablesTab(): Forms\Components\Tabs\Tab
    {
        return Forms\Components\Tabs\Tab::make('Demos')
            ->icon('heroicon-o-trophy')
            ->schema([
                Forms\Components\CheckboxList::make('demos')
                    ->relationship('demos', 'name')
                    ->searchable()
                    ->nullable()
                    ->columnSpanFull(),
            ])
            ->badge(fn (?Model $record) => $record?->demos()->count())
            ->badgeColor('success');
    }
}
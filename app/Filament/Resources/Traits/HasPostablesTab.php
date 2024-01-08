<?php

namespace App\Filament\Resources\Traits;

use Filament\Forms;
use Illuminate\Database\Eloquent\{Builder, Model};

trait HasPostablesTab
{
    public static function getPostablesTab(): Forms\Components\Tabs\Tab
    {
        return Forms\Components\Tabs\Tab::make('Posts')
            ->icon('heroicon-o-document-text')
            ->schema([
                Forms\Components\Select::make('posts')
                    ->multiple()
                    ->relationship('posts', 'name', fn (Builder $query) => $query->with('postCategories'))
                    ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->postCategories->first()?->name} : {$record->name}")
                    ->searchable()
                    ->nullable()
                    ->columnSpanFull(),
            ])
            ->badge(fn (?Model $record) => $record?->posts()->count())
            ->badgeColor('success');
    }
}
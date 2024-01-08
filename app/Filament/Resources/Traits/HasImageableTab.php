<?php

namespace App\Filament\Resources\Traits;

use Filament\Forms;
use Illuminate\Database\Eloquent\{Builder, Model};

trait HasImageableTab
{
    public static function getImageableTab(): Forms\Components\Tabs\Tab
    {
        return Forms\Components\Tabs\Tab::make('Image')
            ->icon('heroicon-o-photo')
            ->schema([
                Forms\Components\Group::make()
                    ->relationship('image', condition: fn (?array $state): bool => filled($state['url']))
                    ->schema([
                        Forms\Components\ViewField::make('url')
                            ->label('Image URL')
                            ->view('filament.forms.components.image'),
                    ]),
            ]);
    }
}
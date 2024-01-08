<?php

namespace App\Filament\Resources\Traits;

use Filament\Forms;

trait HasNameSlugActiveFormFields
{
    public static function getNameSlugActiveFormFields(): array
    {
        return [
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255)
                ->columnSpan(8),
            Forms\Components\TextInput::make('slug')
                ->disabled()
                ->maxLength(255)
                ->columnSpan(3),
            Forms\Components\Toggle::make('active')
                ->nullable()
                ->inline(false)
                ->columnSpan(1),
        ];
    }
}
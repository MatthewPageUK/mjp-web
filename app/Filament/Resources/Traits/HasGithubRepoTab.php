<?php

namespace App\Filament\Resources\Traits;

use Filament\Forms;
use Illuminate\Database\Eloquent\Model;

trait HasGithubRepoTab
{
    public static function getGithubRepoTab(): Forms\Components\Tabs\Tab
    {
        return Forms\Components\Tabs\Tab::make('Github Repo')
            ->icon('heroicon-o-command-line')
            ->schema([
                Forms\Components\Group::make()
                    ->relationship('githubRepo', condition: fn (?array $state): bool => filled($state['owner']))
                    ->schema([
                        Forms\Components\TextInput::make('owner')
                            ->label('Repository Owner'),
                        Forms\Components\TextInput::make('name')
                            ->label('Repository Name'),
                        Forms\Components\TextInput::make('url')
                            ->columnSpanFull()
                            ->label('URL')
                            ->requiredWith('owner')
                            ->url()
                            ->suffixAction(
                                Forms\Components\Actions\Action::make('openUrl')
                                    ->icon('heroicon-m-arrow-top-right-on-square')
                                    ->url(fn (?string $state): ?string => $state, true),
                            ),
                    ])
                    ->columns(2)
            ]);
    }
}
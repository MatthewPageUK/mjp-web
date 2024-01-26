<?php

namespace App\Filament\Resources\Traits;

use Filament\Forms;

trait HasTimestampsTab
{
    /**
     * Get the timestamps tab.
     *
     * @param  bool  $disabled  Whether the timestamps should be disabled. @todo: Implement this.
     * @param  bool  $deleted   Whether the deleted_at timestamp should be visible.
     * @return \Filament\Forms\Components\Tabs\Tab
     */
    public static function getTimestampsTab(bool $disabled = false, bool $deleted = true): Forms\Components\Tabs\Tab
    {
        return Forms\Components\Tabs\Tab::make('Timestamps')
            ->icon('heroicon-o-clock')
            ->schema([
                Forms\Components\DateTimePicker::make('created_at')
                    ->disabled($disabled)
                    ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 4]),
                Forms\Components\DateTimePicker::make('updated_at')
                    ->disabled($disabled)
                    ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 4]),
                Forms\Components\DateTimePicker::make('deleted_at')
                    ->disabled($disabled)
                    ->visible($deleted)
                    ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 4]),
            ])
            ->columns(12);
    }
}
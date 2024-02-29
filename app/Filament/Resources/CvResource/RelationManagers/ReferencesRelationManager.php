<?php

namespace App\Filament\Resources\CvResource\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class ReferencesRelationManager extends RelationManager
{
    protected static string $relationship = 'references';

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('position'),
                Tables\Columns\TextColumn::make('company'),
            ])
            ->paginated(false)
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\AttachAction::make(),
            ])
            ->actions([
                Tables\Actions\DetachAction::make(),
            ])
            ->bulkActions([
                //
            ]);
    }
}

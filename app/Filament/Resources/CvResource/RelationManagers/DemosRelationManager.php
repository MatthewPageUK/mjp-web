<?php

namespace App\Filament\Resources\CvResource\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class DemosRelationManager extends RelationManager
{
    protected static string $relationship = 'demos';

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\ImageColumn::make('image.url')
                    ->width(160)
                    ->height(90)
                    ->label('Image'),
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

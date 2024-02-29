<?php

namespace App\Filament\Resources\CvResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class CvSectionsRelationManager extends RelationManager
{
    protected static string $relationship = 'cvSections';

    protected static ?string $title = 'Sections';

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('order'),
                Tables\Columns\TextColumn::make('heading'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('type')
                    ->badge(),
            ])
            ->paginated(false)
            ->reorderable('order')
            ->defaultSort('order')
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\AttachAction::make()
                    ->form(fn (Tables\Actions\AttachAction $action): array => [
                        $action->getRecordSelect(),
                        Forms\Components\TextInput::make('order')
                            ->numeric()
                            ->default('0'),
                    ]),
            ])
            ->actions([
                Tables\Actions\DetachAction::make(),
            ]);
    }
}

<?php

namespace App\Filament\Resources\CvResource\RelationManagers;

use App\Enums\CvSkillType;
use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class SkillsRelationManager extends RelationManager
{
    protected static string $relationship = 'skills';

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('order'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('tag')
                    ->formatStateUsing(fn (string $state): string => CvSkillType::tryFrom($state)->getLabel())
                    ->label('Type'),
            ])
            ->reorderable('order')
            ->defaultSort('order')
            ->paginated(false)
            ->filters([
                Tables\Filters\SelectFilter::make('tag')
                ->options(CvSkillType::class)
            ])
            ->headerActions([
                Tables\Actions\AttachAction::make()
                    ->form(fn (Tables\Actions\AttachAction $action): array => [
                        $action->getRecordSelect(),
                        Forms\Components\Select::make('tag')
                            ->options(CvSkillType::class)
                            ->required(),
                        Forms\Components\TextInput::make('order')
                            ->numeric()
                            ->default('0'),
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->form([
                        Forms\Components\Select::make('tag')
                            ->options(CvSkillType::class)
                            ->required(),
                        Forms\Components\TextInput::make('order')
                            ->numeric()
                            ->default('0'),
                    ]),
                Tables\Actions\DetachAction::make(),
            ])
            ->bulkActions([
                //
            ]);
    }
}

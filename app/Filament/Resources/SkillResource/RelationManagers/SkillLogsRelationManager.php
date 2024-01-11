<?php

namespace App\Filament\Resources\SkillResource\RelationManagers;

use App\Enums\SkillLogLevel;
use App\Enums\SkillLogType;
use App\Filament\Resources\SkillLogResource;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class SkillLogsRelationManager extends RelationManager
{
    protected static string $relationship = 'skillLogs';

    public function form(Form $form): Form
    {
        // return SkillLogResource::form($form);

        return $form
            ->schema([
                Forms\Components\DatePicker::make('date')
                    ->required()
                    ->default(now())
                    ->columnSpan(4),
                Forms\Components\Select::make('type')
                    ->options(SkillLogType::class)
                    ->required()
                    ->default(SkillLogType::Use)
                    ->columnSpan(3),
                Forms\Components\Select::make('level')
                    ->options(SkillLogLevel::class)
                    ->required()
                    ->default(SkillLogLevel::Intermediate)
                    ->columnSpan(3),
                Forms\Components\TextInput::make('minutes')
                    ->required()
                    ->numeric()
                    ->default(60)
                    ->columnSpan(2),
                Forms\Components\TextInput::make('description')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('notes')
                    ->maxLength(65535)
                    ->columnSpanFull()
                    ->rows(5),
            ])
            ->columns(12);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('description')
            ->columns([
                Tables\Columns\TextColumn::make('date')
                    ->date(),
                Tables\Columns\TextColumn::make('type')
                    ->sortable(),
                Tables\Columns\TextColumn::make('level')
                    ->sortable(),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('minutes')
                    ->numeric()
                    ->sortable(),
            ])
            ->paginated(false)
            ->defaultSort('date', 'desc')
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }
}

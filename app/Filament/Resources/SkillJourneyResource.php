<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SkillJourneyResource\Pages;
use App\Filament\Resources\Traits;
use App\Models\SkillJourney;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SkillJourneyResource extends Resource
{
    use Traits\HasNavigationBadgeModelCount;
    use Traits\HasTimestampColumns;

    protected static ?string $model = SkillJourney::class;

    protected static ?string $navigationIcon = 'heroicon-o-map';

    protected static ?string $navigationGroup = 'Data';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->autofocus()
                    ->required()
                    ->placeholder('Enter name...')
                    ->label('Name')
                    ->columnSpanFull(),
                Forms\Components\Select::make('skill_id')
                    ->label('Skill')
                    ->relationship('skill', 'name')
                    ->columnSpan(6),
                Forms\Components\DatePicker::make('completed_at')
                    ->label('Completed')
                    ->columnSpan(6),
            ])
            ->columns(12);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\IconColumn::make('completed_at')
                    ->label('Completed')
                    ->boolean(),
                Tables\Columns\TextColumn::make('skill.name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ViewColumn::make('age')
                    ->view('filament.tables.columns.create-age'),
                ...static::getTimestampColumns(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('skill')
                    ->relationship('skill', 'name'),
                Tables\Filters\TernaryFilter::make('completed_at')
                    ->label('Completed')
                    ->nullable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSkillJourneys::route('/'),
            'create' => Pages\CreateSkillJourney::route('/create'),
            'edit' => Pages\EditSkillJourney::route('/{record}/edit'),
        ];
    }
}

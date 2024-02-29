<?php

namespace App\Filament\Resources;

use App\Enums\CvSectionType;
use App\Filament\Resources\CvSectionResource\Pages;
use App\Models\CvSection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CvSectionResource extends Resource
{
    protected static ?string $model = CvSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'CVs';

    protected static ?string $navigationLabel = 'Sections';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->columnSpan(9),
                Forms\Components\Select::make('type')
                    ->options(CvSectionType::class)
                    ->required()
                    ->columnSpan(3),
                Forms\Components\TextInput::make('heading')
                    ->required()
                    ->maxLength(255)
                    ->columnSpan(6),
                Forms\Components\TextInput::make('sub_heading')
                    ->maxLength(255)
                    ->columnSpan(6),
                Forms\Components\Textarea::make('content')
                    ->rows(10)
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ])
            ->columns(12);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('heading'),
            ])
            ->paginated(false)
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCvSections::route('/'),
            'create' => Pages\CreateCvSection::route('/create'),
            'edit' => Pages\EditCvSection::route('/{record}/edit'),
        ];
    }
}

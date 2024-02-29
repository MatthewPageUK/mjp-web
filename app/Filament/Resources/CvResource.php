<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CvResource\Pages;
use App\Filament\Resources\CvResource\RelationManagers;
use App\Models\Cv;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CvResource extends Resource
{
    protected static ?string $model = Cv::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-check';

    protected static ?string $navigationGroup = 'CVs';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Name')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\DatePicker::make('issue_date')
                    ->label('Issue Date')
                    ->required()
                    ->columnSpan(2),
                Forms\Components\TextInput::make('issued_to_person')
                    ->label('Person')
                    ->columnSpan(5),
                Forms\Components\TextInput::make('issued_to_company')
                    ->label('Company')
                    ->columnSpan(5),
            ])
            ->columns(12);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('issue_date')
                    ->dateTime('d F Y'),
                Tables\Columns\TextColumn::make('issued_to_person'),
                Tables\Columns\TextColumn::make('issued_to_company'),
            ])
            ->paginated(false)
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('download')
                    ->label('PDF')
                    ->icon('heroicon-o-document-arrow-down')
                    ->url(
                        fn (Cv $record): string => route('cv.pdf.download', ['cv' => $record]),
                        shouldOpenInNewTab: true
                    ),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\CvSectionsRelationManager::class,
            RelationManagers\ExperiencesRelationManager::class,
            RelationManagers\SkillsRelationManager::class,
            RelationManagers\ProjectsRelationManager::class,
            RelationManagers\DemosRelationManager::class,
            RelationManagers\BooksRelationManager::class,
            RelationManagers\ReferencesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCvs::route('/'),
            'create' => Pages\CreateCv::route('/create'),
            'edit' => Pages\EditCv::route('/{record}/edit'),
        ];
    }
}

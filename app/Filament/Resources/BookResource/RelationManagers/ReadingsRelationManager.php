<?php

namespace App\Filament\Resources\BookResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class ReadingsRelationManager extends RelationManager
{
    protected static string $relationship = 'readings';

    protected static ?string $title = 'Reading sessions';

    public function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('chapter')
                    ->datalist(function (RelationManager $livewire): array {
                        return $livewire->getOwnerRecord()->readings()
                            ->pluck('chapter', 'chapter')
                            ->toArray();
                    })
                    ->autocomplete(false)
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('pages')
                    ->required()
                    ->maxLength(255)
                    ->columnSpan(6),
                Forms\Components\TextInput::make('minutes')
                    ->required()
                    ->numeric()
                    ->columnSpan(6),
                Forms\Components\MarkdownEditor::make('notes')
                    ->columnSpanFull(),
            ])
            ->columns(12);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('created_at')
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date'),
                Tables\Columns\TextColumn::make('chapter'),
                Tables\Columns\TextColumn::make('pages'),
                Tables\Columns\TextColumn::make('minutes')
                    ->summarize(
                        Tables\Columns\Summarizers\Sum::make()
                            ->label('Read time')
                    ),
            ])
            ->defaultSort('created_at', 'desc')
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Add Reading Session')
                    ->icon('heroicon-o-book-open'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->paginated(false);
    }
}

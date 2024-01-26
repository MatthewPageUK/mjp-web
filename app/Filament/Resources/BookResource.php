<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookResource\Pages;
use App\Filament\Resources\BookResource\RelationManagers;
use App\Models\Book;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class BookResource extends Resource
{
    use Traits\HasImageableTab;
    use Traits\HasNameSlugActiveFormFields;
    use Traits\HasNavigationBadgeModelCount;
    use Traits\HasSkillablesTab;
    use Traits\HasTimestampColumns;
    use Traits\HasTimestampsTab;

    protected static ?string $model = Book::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationGroup = 'Data';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                ...static::getNameSlugActiveFormFields(),
                Forms\Components\TextInput::make('tagline')
                    ->maxLength(255)
                    ->label('Tagline')
                    ->columnSpan(6),
                Forms\Components\TextInput::make('author')
                    ->datalist(Book::all()->pluck('author'))
                    ->autocomplete(false)
                    ->required()
                    ->columnSpan(6),
                Forms\Components\TextInput::make('isbn')
                    ->maxLength(255)
                    ->label('ISBN')
                    ->columnSpan(2),
                Forms\Components\DatePicker::make('first_published')
                    ->label('First Published')
                    ->columnSpan(2),
                Forms\Components\DatePicker::make('published')
                    ->label('Last Published')
                    ->columnSpan(2),
                Forms\Components\TextInput::make('publisher')
                    ->datalist(Book::all()->pluck('publisher'))
                    ->autocomplete(false)
                    ->columnSpan(5),
                Forms\Components\TextInput::make('read_count')
                    ->label('Read Count')
                    ->columnSpan(1),
                Forms\Components\Textarea::make('notes')
                    ->rows(5)
                    ->label('Notes')
                    ->columnSpan(12),
                Forms\Components\Tabs::make('Tabs')
                    ->tabs([
                        static::getSkillablesTab(),
                        static::getImageableTab(),
                        static::getTimestampsTab(),
                    ])
                    ->columnSpan(12)
                    ->activeTab(1),

            ])->columns(12);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('author')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('publisher')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('readings_count')
                    ->label('Sessions')
                    ->counts('readings'),
                Tables\Columns\TextColumn::make('read_count')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\Filter::make('unread')
                    ->label('Unfinished')
                    ->query(function (Builder $query) {
                        $query->where('read_count', 0);
                    })
                    ->toggle(),
                Tables\Filters\Filter::make('not_started')
                    ->label('Not started')
                    ->query(function (Builder $query) {
                        $query->whereDoesntHave('readings');
                    })
                    ->toggle(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\ReadingsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBooks::route('/'),
            'create' => Pages\CreateBook::route('/create'),
            'edit' => Pages\EditBook::route('/{record}/edit'),
        ];
    }
}

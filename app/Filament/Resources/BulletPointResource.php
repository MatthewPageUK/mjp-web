<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BulletPointResource\Pages;
use App\Filament\Resources\Traits;
use App\Models\BulletPoint;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BulletPointResource extends Resource
{
    use Traits\HasNavigationBadgeModelCount;
    use Traits\HasTimestampColumns;

    protected static ?string $model = BulletPoint::class;

    protected static ?string $navigationIcon = 'heroicon-o-list-bullet';

    protected static ?string $navigationGroup = 'Data';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->columnSpan(['sm' => 12, 'md' => 8])
                    ->maxLength(64)
                    ->required(),
                Forms\Components\TextInput::make('order')
                    ->columnSpan(['sm' => 12, 'md' => 2])
                    ->default(fn () => BulletPoint::max('order') + 1)
                    ->numeric()
                    ->required(),
            ])
            ->columns(12);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Bullet point'),
                ...static::getTimestampColumns(),
            ])
            ->defaultSort('order')
            ->reorderable('order')
            ->paginated(false)
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBulletPoints::route('/'),
            'create' => Pages\CreateBulletPoint::route('/create'),
            'edit' => Pages\EditBulletPoint::route('/{record}/edit'),
        ];
    }
}

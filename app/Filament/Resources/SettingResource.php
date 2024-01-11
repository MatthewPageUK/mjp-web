<?php

namespace App\Filament\Resources;

use App\Enums\SettingType;
use App\Filament\Resources\SettingResource\Pages;
use App\Filament\Resources\Traits;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class SettingResource extends Resource
{
    use Traits\HasNavigationBadgeModelCount;
    use Traits\HasTimestampColumns;

    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationGroup = 'System';

    protected static ?int $navigationSort = 100;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('key')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('value')
                    ->maxLength(65535)
                    ->rows(15)
                    ->columnSpanFull(),
                Forms\Components\Select::make('type')
                    ->options(SettingType::class)
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('key')
                    ->searchable()
                    ->formatStateUsing(function (string $state, $record) {
                        return $record->getLabel();
                    }),
                Tables\Columns\TextColumn::make('type'),
                ...static::getTimestampColumns(),
            ])
            ->paginated(false)
            ->defaultSort('key')
            ->filters(static::getTableFilters())
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }

    public static function getTableFilters(): array
    {
        return collect([
            'demos' => 'Demo Settings',
            'experiences' => 'Experience Settings',
            'projects' => 'Project Settings',
            'posts' => 'Post Settings',
            'skills' => 'Skill Settings',
            'homepage' => 'Homepage Settings',
            'url' => 'URLs',
        ])->map(function ($label, $key) {
            return Tables\Filters\Filter::make($key)
                ->label($label)
                ->query(fn (Builder $query): Builder => $query->where('key', 'like', $key . '_%'));
        })->toArray();
    }
}

<?php

namespace App\Filament\Resources;

use App\Enums\SkillLogLevel;
use App\Enums\SkillLogType;
use App\Filament\Resources\SkillLogResource\Pages;
use App\Models\Skill;
use App\Models\SkillLog;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class SkillLogResource extends Resource
{
    use Traits\HasTimestampColumns;
    use Traits\HasNavigationBadgeModelCount;

    protected static ?string $model = SkillLog::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar-square';

    protected static ?string $navigationGroup = 'Data';

    public static function form(Form $form): Form
    {
        $defaultSkills = Skill::where('slug', 'laravel')
            ->orWhere('slug', 'php')
            ->orWhere('slug', 'livewire')
            ->orWhere('slug', 'alpinejs')
            ->get()
            ->pluck('id')
            ->toArray();

        return $form
            ->schema([
                Forms\Components\DatePicker::make('date')
                    ->required()
                    ->default(now())
                    ->columnSpan(['default' => 2, 'md' => 3]),
                Forms\Components\Select::make('type')
                    ->options(SkillLogType::class)
                    ->default(SkillLogType::Use)
                    ->required()
                    ->columnSpan(['default' => 2, 'md' => 3]),
                Forms\Components\Select::make('level')
                    ->options(SkillLogLevel::class)
                    ->default(SkillLogLevel::Intermediate)
                    ->required()
                    ->columnSpan(['default' => 2, 'md' => 3]),
                Forms\Components\Select::make('minutes')
                    ->options(['30' => '1/2 hour', '60' => '1 hour', '120' => '2 hours', '180' => '3 hours', '240' => '4 hours', '300' => '5 hours'])
                    ->default('60')
                    ->required()
                    ->columnSpan(['default' => 2, 'md' => 3]),
                Forms\Components\Select::make('skills')
                    ->relationship('skills', 'name')
                    ->multiple()
                    ->default($defaultSkills)
                    ->preload()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('description')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('notes')
                    ->maxLength(65535)
                    ->rows(5)
                    ->columnSpanFull(),
            ])
            ->columns(['default' => 4, 'md' => 12, 'lg' => 12]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('type')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('level')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('skills.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('minutes')
                    ->numeric()
                    ->sortable(),
                ...static::getTimestampColumns(),
            ])
            ->defaultSort('date', 'desc')
            ->filters([
                Tables\Filters\Filter::make('learn')
                    ->label('Learn the skill')
                    ->query(function (Builder $query) {
                        $query->where('type', SkillLogType::Learn);
                    })
                    ->toggle(),
                Tables\Filters\Filter::make('use')
                    ->label('Use the skill')
                    ->query(function (Builder $query) {
                        $query->where('type', SkillLogType::Use);
                    })
                    ->toggle(),
                Tables\Filters\SelectFilter::make('skills')
                    ->relationship('skills', 'name'),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSkillLogs::route('/'),
            'create' => Pages\CreateSkillLog::route('/create'),
            'edit' => Pages\EditSkillLog::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExperienceResource\Pages;
use App\Filament\Resources\Traits;
use App\Models\Experience;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ExperienceResource extends Resource
{
    use Traits\HasImageableTab;
    use Traits\HasNameSlugActiveFormFields;
    use Traits\HasNavigationBadgeModelCount;
    use Traits\HasPostablesTab;
    use Traits\HasSkillablesTab;
    use Traits\HasTimestampColumns;
    use Traits\HasTimestampsTab;

    protected static ?string $model = Experience::class;

    protected static ?string $navigationIcon = 'heroicon-o-globe-europe-africa';

    protected static ?string $navigationGroup = 'Data';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                ...static::getNameSlugActiveFormFields(),
                Forms\Components\DatePicker::make('start')
                    ->label('Date started')
                    ->required()
                    ->columnSpan(6),
                Forms\Components\DatePicker::make('end')
                    ->label('Date ended')
                    ->columnSpan(6),
                Forms\Components\MarkdownEditor::make('description')
                    ->label('Description of the job and work')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Repeater::make('key_points')
                    ->schema([
                        Forms\Components\TextInput::make('title')->required(),
                        Forms\Components\TextInput::make('text')->required(),
                    ])
                    ->collapsed()
                    ->itemLabel(fn (array $state): ?string => $state['title'] ?? null)
                    ->columnSpanFull(),
                Forms\Components\Tabs::make('Tabs')
                    ->tabs([
                        static::getImageableTab(),
                        static::getPostablesTab(),
                        static::getSkillablesTab(),
                        static::getTimestampsTab(),
                    ])
                    ->activeTab(3)
                    ->columnSpanFull(),

            ])
            ->columns(12);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\IconColumn::make('active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('start')
                    ->date(format: 'F Y'),
                Tables\Columns\TextColumn::make('end')
                    ->date(format: 'F Y'),
                Tables\Columns\TextColumn::make('name'),
                ...static::getTimestampColumns(),
            ])
            ->paginated(false)
            ->defaultSort('start', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('skill')
                    ->relationship('skills', 'name'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListExperiences::route('/'),
            'create' => Pages\CreateExperience::route('/create'),
            'edit' => Pages\EditExperience::route('/{record}/edit'),
        ];
    }

}

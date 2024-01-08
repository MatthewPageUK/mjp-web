<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\Traits;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Carbon;

class ProjectResource extends Resource
{
    use Traits\HasGithubRepoTab;
    use Traits\HasImageableTab;
    use Traits\HasNameSlugActiveFormFields;
    use Traits\HasNavigationBadgeModelCount;
    use Traits\HasPostablesTab;
    use Traits\HasSkillablesTab;
    use Traits\HasTimestampColumns;
    use Traits\HasTimestampsTab;

    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-rocket-launch';

    protected static ?string $navigationGroup = 'Data';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                ...static::getNameSlugActiveFormFields(),
                Forms\Components\MarkdownEditor::make('description')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('website')
                    ->columnSpan(8)
                    ->maxLength(255)
                    ->url()
                    ->suffixAction(
                        Forms\Components\Actions\Action::make('openUrl')
                            ->icon('heroicon-m-arrow-top-right-on-square')
                            ->url(fn (?string $state): ?string => $state, true),
                    ),
                // @todo @bug Check the Project model for the last_active attribute.
                Forms\Components\DateTimePicker::make('last_active')
                    ->label(fn ($state) => $state ? 'Last active - ' . Carbon::parse($state)->diffForHumans() : 'Last Active')
                    ->columnSpan(4)
                    ->nullable()
                    ->suffixAction(
                        Forms\Components\Actions\Action::make('now')
                            ->icon('heroicon-s-clock')
                            ->action(function (Set $set) {
                                $set('last_active', now()->toDateTimeString());
                            }),
                    ),
                Forms\Components\Tabs::make('Tabs')
                    ->tabs([
                        static::getGithubRepoTab(),
                        static::getImageableTab(),
                        static::getPostablesTab(),
                        static::getSkillablesTab(),
                        static::getTimestampsTab(),
                    ])
                    ->activeTab(4)
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
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('skills.name'),
                Tables\Columns\TextColumn::make('last_active')
                    ->dateTime()
                    ->sortable(),
                ...static::getTimestampColumns(),
            ])
            ->paginated(false)
            ->defaultSort('name')
            ->filters([
                Tables\Filters\SelectFilter::make('skills')
                    ->relationship('skills', 'name'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}

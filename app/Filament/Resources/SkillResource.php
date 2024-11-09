<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SkillResource\Pages;
use App\Filament\Resources\SkillResource\RelationManagers;
use App\Filament\Resources\Traits;
use App\Models\Skill;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn\TextColumnSize;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Relations\Relation;

class SkillResource extends Resource
{
    use Traits\HasDemoablesTab;
    use Traits\HasExperienceablesTab;
    use Traits\HasImageableTab;
    use Traits\HasNameSlugActiveFormFields;
    use Traits\HasNavigationBadgeModelCount;
    use Traits\HasPostablesTab;
    use Traits\HasProjectablesTab;
    use Traits\HasSkillLevelColumn;
    use Traits\HasTimestampColumns;
    use Traits\HasTimestampsTab;

    protected static ?string $model = Skill::class;

    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';

    protected static ?string $navigationGroup = 'Data';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                ...static::getNameSlugActiveFormFields(),
                // Forms\Components\Select::make('skillGroups')
                //     ->relationship('skillGroups', 'name')
                //     ->label('Group')
                //     ->columnSpan(6),
                // Forms\Components\ViewField::make('level')
                //     ->view('filament.forms.components.range-slider')
                //     ->columnSpan(6),
                // Forms\Components\Textarea::make('svg')
                //     ->maxLength(65535)
                //     ->columnSpan(12),
                // Forms\Components\MarkdownEditor::make('description')
                //     ->maxLength(65535)
                //     ->columnSpanFull(),
                // Forms\Components\Tabs::make('Tabs')
                //     ->tabs([
                //         static::getDemoablesTab(),
                //         static::getExperienceablesTab(),
                //         static::getImageableTab(),
                //         static::getPostablesTab(),
                //         static::getProjectablesTab(),
                //         static::getTimestampsTab(),
                //     ])
                //     ->columnSpanFull(),
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
                    ->size(TextColumnSize::Large)
                    ->weight(FontWeight::Black),
                Tables\Columns\TextColumn::make('skillGroups.name')
                    ->label('Group'),
                static::getSkillLevelColumn(),
                Tables\Columns\TextColumn::make('skill_journeys_count')
                    ->label('Journeys')
                    ->counts('skillJourneys'),
                Tables\Columns\TextColumn::make('skill_logs_count')
                    ->label('Logs')
                    ->counts('skillLogs'),
                Tables\Columns\TextColumn::make('demos_count')
                    ->label('Demos')
                    ->counts('demos'),
                Tables\Columns\TextColumn::make('projects_count')
                    ->label('Projects')
                    ->counts('projects'),
                Tables\Columns\TextColumn::make('experiences_count')
                    ->label('Experiences')
                    ->counts('experiences'),
                Tables\Columns\TextColumn::make('posts_count')
                    ->label('Posts')
                    ->counts('posts'),
                ...static::getTimestampColumns(),
            ])
            ->defaultSort('name')
            ->paginated(false)
            ->filters([
                Tables\Filters\SelectFilter::make('skillGroups')
                    ->relationship('skillGroups', 'name'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\SkillJourneysRelationManager::class,
            RelationManagers\SkillLogsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSkills::route('/'),
            'create' => Pages\CreateSkill::route('/create'),
            'edit' => Pages\EditSkill::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DemoResource\Pages;
use App\Filament\Resources\Traits;
use App\Models\Demo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DemoResource extends Resource
{
    use Traits\HasGithubRepoTab;
    use Traits\HasImageableTab;
    use Traits\HasNameSlugActiveFormFields;
    use Traits\HasNavigationBadgeModelCount;
    use Traits\HasSkillablesTab;
    use Traits\HasTimestampColumns;
    use Traits\HasTimestampsTab;
    use Traits\HasPostablesTab;

    protected static ?string $model = Demo::class;

    protected static ?string $navigationIcon = 'heroicon-o-trophy';

    protected static ?string $navigationGroup = 'Data';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                ...static::getNameSlugActiveFormFields(),
                Forms\Components\MarkdownEditor::make('description')
                    ->maxLength(65535)
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('url')
                    ->maxLength(255)
                    ->label('Demo URL')
                    ->columnSpan(6)
                    ->suffixAction(
                        Forms\Components\Actions\Action::make('openUrl')
                            ->icon('heroicon-m-arrow-top-right-on-square')
                            ->url(fn (?string $state): ?string => $state, true),
                    ),
                Forms\Components\TextInput::make('demo_url')
                    ->maxLength(255)
                    ->label('Embedded demo URL')
                    ->columnSpan(6)
                    ->suffixAction(
                        Forms\Components\Actions\Action::make('openUrl')
                            ->icon('heroicon-m-arrow-top-right-on-square')
                            ->url(fn (?string $state): ?string => $state, true),
                    ),
                Forms\Components\Tabs::make('Tabs')
                    ->tabs([
                        static::getGithubRepoTab(),
                        static::getImageableTab(),
                        static::getPostablesTab(),
                        static::getSkillablesTab(),
                        static::getTimestampsTab(),
                    ])
                    ->columnSpanFull()
                    ->activeTab(4),
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
                    ->searchable(),
                Tables\Columns\TextColumn::make('skills.name'),
                Tables\Columns\ViewColumn::make('updated')
                    ->view('filament.tables.columns.update-age'),
                ...static::getTimestampColumns(),
            ])
            ->defaultSort('updated_at', 'desc')
            ->paginated(false)
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
            'index' => Pages\ListDemos::route('/'),
            'create' => Pages\CreateDemo::route('/create'),
            'edit' => Pages\EditDemo::route('/{record}/edit'),
        ];
    }
}

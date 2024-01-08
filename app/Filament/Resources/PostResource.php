<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\Traits;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PostResource extends Resource
{
    use Traits\HasDemoablesTab;
    use Traits\HasExperienceablesTab;
    use Traits\HasGithubRepoTab;
    use Traits\HasImageableTab;
    use Traits\HasNameSlugActiveFormFields;
    use Traits\HasNavigationBadgeModelCount;
    use Traits\HasProjectablesTab;
    use Traits\HasSkillablesTab;
    use Traits\HasTimestampColumns;
    use Traits\HasTimestampsTab;

    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Data';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                ...static::getNameSlugActiveFormFields(),
                Forms\Components\Textarea::make('snippet')
                    ->maxLength(255)
                    ->rows(3)
                    ->columnSpan(8),
                Forms\Components\Select::make('postCategories')
                    ->label('Category')
                    ->relationship('postCategories', 'name')
                    ->createOptionForm([
                        Forms\Components\TextInput::make('name')
                            ->required(),
                        Forms\Components\TextInput::make('description'),
                    ])
                    ->editOptionForm([
                        Forms\Components\TextInput::make('name')
                            ->required(),
                        Forms\Components\TextInput::make('description'),
                    ])
                    ->columnSpan(4),
                Forms\Components\MarkdownEditor::make('content')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Tabs::make('Tabs')
                    ->tabs([
                        static::getDemoablesTab(),
                        static::getExperienceablesTab(),
                        static::getGithubRepoTab(),
                        static::getImageableTab(),
                        static::getProjectablesTab(),
                        static::getSkillablesTab(),
                        static::getTimestampsTab(),
                    ])
                    ->columnSpanFull()
                    ->activeTab(6),
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
                    ->searchable([
                        'name',
                        'snippet',
                        'content',
                    ]),
                Tables\Columns\TextColumn::make('postCategories.name')
                    ->label('Category'),
                Tables\Columns\TextColumn::make('skills.name'),
                ...static::getTimestampColumns(),
            ])
            ->defaultSort('name')
            ->filters([
                Tables\Filters\SelectFilter::make('cateogory')
                    ->relationship('postCategories', 'name'),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}

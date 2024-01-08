<?php

namespace App\Filament\Resources\DemoResource\Widgets;

use App\Filament\Resources\Traits\HasSkillLevelColumn;
use App\Models\Skill;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class UnusedSkills extends BaseWidget
{
    use HasSkillLevelColumn;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Skill::whereDoesntHave('demos')->limit(8)
            )
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Skill'),
                static::getSkillLevelColumn(),
            ])
            ->paginated(false)
            ->defaultSort('level', 'desc');
    }
}

<?php

namespace App\Filament\Resources\DemoResource\Widgets;

use App\Filament\Resources\Traits\HasSkillLevelColumn;
use App\Models\Skill;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class MostUsedSkills extends BaseWidget
{
    use HasSkillLevelColumn;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Skill::withCount('demos')
                    ->orderBy('demos_count', 'desc')
                    ->limit(8)
            )
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Skill'),
                static::getSkillLevelColumn(),
                Tables\Columns\TextColumn::make('demos_count')
            ])
            ->paginated(false);
    }
}

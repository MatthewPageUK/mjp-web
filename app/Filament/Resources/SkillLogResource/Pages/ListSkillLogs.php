<?php

namespace App\Filament\Resources\SkillLogResource\Pages;

use App\Filament\Resources\SkillLogResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSkillLogs extends ListRecords
{
    protected static string $resource = SkillLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

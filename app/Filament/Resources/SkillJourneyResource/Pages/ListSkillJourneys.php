<?php

namespace App\Filament\Resources\SkillJourneyResource\Pages;

use App\Filament\Resources\SkillJourneyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSkillJourneys extends ListRecords
{
    protected static string $resource = SkillJourneyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

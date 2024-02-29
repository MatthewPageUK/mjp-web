<?php

namespace App\Filament\Resources\CvSectionResource\Pages;

use App\Filament\Resources\CvSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCvSections extends ListRecords
{
    protected static string $resource = CvSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\CvSectionResource\Pages;

use App\Filament\Resources\CvSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCvSection extends EditRecord
{
    protected static string $resource = CvSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

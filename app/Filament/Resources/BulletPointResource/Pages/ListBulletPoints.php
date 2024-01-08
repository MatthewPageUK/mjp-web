<?php

namespace App\Filament\Resources\BulletPointResource\Pages;

use App\Filament\Resources\BulletPointResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBulletPoints extends ListRecords
{
    protected static string $resource = BulletPointResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

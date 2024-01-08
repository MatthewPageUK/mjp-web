<?php

namespace App\Filament\Resources\BulletPointResource\Pages;

use App\Filament\Resources\BulletPointResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBulletPoint extends EditRecord
{
    protected static string $resource = BulletPointResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

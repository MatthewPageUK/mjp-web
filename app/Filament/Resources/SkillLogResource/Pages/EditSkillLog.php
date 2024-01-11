<?php

namespace App\Filament\Resources\SkillLogResource\Pages;

use App\Filament\Resources\SkillLogResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSkillLog extends EditRecord
{
    protected static string $resource = SkillLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

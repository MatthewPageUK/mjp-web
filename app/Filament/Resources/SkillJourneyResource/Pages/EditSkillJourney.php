<?php

namespace App\Filament\Resources\SkillJourneyResource\Pages;

use App\Filament\Resources\SkillJourneyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditSkillJourney extends EditRecord
{
    protected static string $resource = SkillJourneyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\Action::make('complete')
                ->hidden(fn (Model $record) => $record->completed_at !== null)
                ->label('Mark Journey Complete')
                ->color('success')
                ->icon('heroicon-o-check-circle')
                ->requiresConfirmation()
                ->action(function (Model $record) {
                    $record->update([
                        'completed_at' => now(),
                    ]);
                    // @todo @bug This is not refreshing the table / value
                    $this->refreshFormData([
                        'completed_at',
                    ]);
                }),
        ];
    }
}

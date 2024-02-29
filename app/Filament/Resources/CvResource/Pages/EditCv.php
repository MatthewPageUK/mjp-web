<?php

namespace App\Filament\Resources\CvResource\Pages;

use App\Filament\Resources\CvResource;
use App\Models\Cv;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCv extends EditRecord
{
    protected static string $resource = CvResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\Action::make('download')
                ->label('Download PDF')
                ->icon('heroicon-o-document-arrow-down')
                ->color('success')
                ->url(
                    fn (Cv $record): string => route('cv.pdf.download', ['cv' => $record]),
                    shouldOpenInNewTab: true
                ),
            Actions\Action::make('preview')
                ->label('Preview')
                ->icon('heroicon-o-computer-desktop')
                ->color('success')
                ->url(
                    fn (Cv $record): string => route('cv.pdf.view', ['cv' => $record]),
                    shouldOpenInNewTab: true
                ),
        ];
    }
}

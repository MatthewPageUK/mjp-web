<?php

namespace App\Filament\Resources\MessageResource\Pages;

use App\Filament\Resources\MessageResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists;
use Filament\Actions\Action;
use Filament\Infolists\Infolist;

class ViewMessage extends ViewRecord
{
    protected static string $resource = MessageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('delete')
                ->icon('heroicon-o-trash')
                ->requiresConfirmation()
                ->action(fn () => $this->post->delete()),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\TextEntry::make('first_name')
                    ->size(Infolists\Components\TextEntry\TextEntrySize::Large),
                Infolists\Components\TextEntry::make('surname')
                    ->size(Infolists\Components\TextEntry\TextEntrySize::Large),
                Infolists\Components\TextEntry::make('email')
                    ->size(Infolists\Components\TextEntry\TextEntrySize::Large)
                    ->icon('heroicon-o-inbox-arrow-down')
                    ->copyable()
                    ->copyMessage('Copied!')
                    ->copyMessageDuration(1500),
                Infolists\Components\TextEntry::make('company')
                    ->size(Infolists\Components\TextEntry\TextEntrySize::Large)
                    ->icon('heroicon-o-building-office-2'),
                Infolists\Components\TextEntry::make('telephone')
                    ->size(Infolists\Components\TextEntry\TextEntrySize::Large)
                    ->icon('heroicon-o-phone'),
                Infolists\Components\TextEntry::make('message')
                    ->icon('heroicon-o-chat-bubble-bottom-center-text')
                    ->columnSpanFull(),
            ]);
    }
}

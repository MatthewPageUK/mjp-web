<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\MessageResource;
use App\Models\Message;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Model;

class LatestMessages extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Message::orderByDesc('created_at')->limit(10)
            )
            ->columns([
                Tables\Columns\ViewColumn::make('from')
                    ->view('filament.tables.columns.full-name'),
                Tables\Columns\TextColumn::make('company'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\ViewColumn::make('age')
                    ->view('filament.tables.columns.create-age')
            ])
            ->actions([
                Tables\Actions\Action::make('view')
                    ->url(fn (Model $message) => MessageResource::getUrl('view', ['record' => $message]))
                    ->icon('heroicon-o-eye')
            ])
            ->paginated(false);
    }
}

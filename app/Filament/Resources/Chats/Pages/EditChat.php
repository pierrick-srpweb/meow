<?php

namespace App\Filament\Resources\Chats\Pages;

use App\Filament\Resources\Chats\ChatResource;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditChat extends EditRecord
{
    protected static string $resource = ChatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('voir_sur_site')
                ->label('Voir sur le site')
                ->icon('heroicon-o-eye')
                ->color('info')
                ->url(fn () => route('voir-chat', $this->record))
                ->openUrlInNewTab(),
            DeleteAction::make(),
        ];
    }
}

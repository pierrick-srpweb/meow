<?php

namespace App\Filament\Resources\Chats\Pages;

use App\Filament\Resources\Chats\ChatResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateChat extends CreateRecord
{
    protected static string $resource = ChatResource::class;

    #[\Override]
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['slug'] = Str::slug($data['nom'].'-'.Str::random(6));

        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}

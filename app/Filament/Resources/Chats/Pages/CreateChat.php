<?php

namespace App\Filament\Resources\ChatResource\Pages;

use App\Filament\Resources\ChatResource;
use App\Models\Chat;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateChat extends CreateRecord
{
    protected static string $resource = ChatResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['slug'] = Str::slug(Chat::count() + 15623 . '-' . $data['nom']);

        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}

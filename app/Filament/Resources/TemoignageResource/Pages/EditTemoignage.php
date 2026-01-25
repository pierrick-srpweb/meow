<?php

namespace App\Filament\Resources\TemoignageResource\Pages;

use App\Filament\Resources\TemoignageResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTemoignage extends EditRecord
{
    protected static string $resource = TemoignageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

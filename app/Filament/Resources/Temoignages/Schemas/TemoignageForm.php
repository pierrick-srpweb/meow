<?php

namespace App\Filament\Resources\Temoignages\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TemoignageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->columns(1)
                    ->schema([
                        Select::make('chat_id')
                            ->relationship(name: 'chat', titleAttribute: 'nom')
                            ->searchable()
                            ->preload(),

                        RichEditor::make('contenu')
                            ->required(),

                        TextInput::make('famille')
                            ->required(),
                    ]),
            ]);
    }
}

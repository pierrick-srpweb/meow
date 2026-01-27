<?php

namespace App\Filament\Resources\Chats\Schemas;

use App\Models\Chat;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;

class ChatForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('created_at')
                    ->label('Création de la fiche')
                    ->state(fn (?Chat $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                TextEntry::make('updated_at')
                    ->label('Dernière modification')
                    ->state(fn (?Chat $record): string => $record?->updated_at?->diffForHumans() ?? '-'),

                Toggle::make('est_publie')
                    ->onColor('success')
                    ->columnSpanFull(),

                TextInput::make('nom')
                    ->required(),

                Select::make('sexe')
                    ->options([
                        'Mâle' => 'male',
                        'Femelle' => 'femelle',
                    ]),

                DatePicker::make('date_naissance'),

                Select::make('categorie')
                    ->options([
                        'Adulte' => 'Adulte',
                        'Chaton' => 'Chaton',
                        'Senior' => 'Senior',
                        'Adopté' => 'Adopté',
                        'Etoile' => 'Etoile',
                    ])
                    ->required(),

                Fieldset::make('attributs')
                    ->schema([
                        Checkbox::make('ok_chien'),

                        Checkbox::make('ok_enfant'),

                        Checkbox::make('litiere'),
                    ]),

                RichEditor::make('description')
                    ->columnSpanFull(),

                SpatieMediaLibraryFileUpload::make('cv')
                    ->image()
                    ->optimize('webp')
                    ->maxImageWidth(1200)
                    ->collection('cv')
                    ->responsiveImages()
                    ->columnSpanFull()
                    ->required(),

                SpatieMediaLibraryFileUpload::make('photos')
                    ->image()
                    ->optimize('webp')
                    ->maxImageWidth(1200)
                    ->multiple()
                    ->reorderable()
                    ->columnSpanFull()
                    ->collection('photos'),

                /* DatePicker::make('vaccination'),

                    TextInput::make('numero_puce'),

                    DatePicker::make('antipuce'),

                    DatePicker::make('vermifuge'),

                    DatePicker::make('adoption'),*/
            ]);
    }
}

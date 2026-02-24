<?php

namespace App\Filament\Pages;

use App\Settings\AssoSettings;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class InformationsAsso extends SettingsPage
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $settings = AssoSettings::class;

    #[\Override]
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Adresse')
                    ->columns(2)
                    ->schema([
                        TextInput::make('adresse')
                            ->columnSpan(2)
                            ->required(),
                        TextInput::make('code_postal')
                            ->columnSpan(1)
                            ->required(),
                        TextInput::make('ville')
                            ->columnSpan(1)
                            ->required(),
                    ]),

                Section::make('Info de contact')
                    ->columns(2)
                    ->schema([
                        TextInput::make('telephone')
                            ->tel()
                            ->required(),
                        TextInput::make('email')
                            ->email()
                            ->required(),

                    ]),

                Section::make('Liens')
                    ->columns(2)
                    ->schema([
                        TextInput::make('facebook')
                            ->url()
                            ->required(),
                        TextInput::make('site_dons')
                            ->url()
                            ->required(),
                    ]),

                Section::make('Liste des tarifs')
                    ->columnSpanFull()
                    ->schema([
                        Repeater::make('tarifs')
                            ->schema([
                                TextInput::make('prestation')->required(),
                                TextInput::make('prix')->required(),
                            ])
                            ->columns(2),
                    ]),
            ]);
    }
}

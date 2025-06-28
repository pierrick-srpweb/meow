<?php

namespace App\Filament\Pages;

use App\Settings\AssoSettings;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class InformationsAsso extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $settings = AssoSettings::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Adresse')
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

                Forms\Components\Section::make('Info de contact')
                    ->columns(2)
                    ->schema([
                        TextInput::make('telephone')
                            ->required(),
                        TextInput::make('email')
                            ->required(),

                    ]),

                Forms\Components\Section::make('Liens')
                    ->columns(2)
                    ->schema([
                        TextInput::make('facebook')
                            ->required(),
                        TextInput::make('site_dons')
                            ->required(),
                    ]),
            ]);
    }
}

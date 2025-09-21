<?php

namespace App\Filament\Pages;

use App\Settings\PageSettings;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class AccueilPage extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static ?string $navigationGroup = 'Page';

    protected static ?string $navigationLabel = 'Accueil';

    protected static string $settings = PageSettings::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('L\'Association')
                    ->schema([
                        FileUpload::make('photo_principale_association')
                            ->label('Photo principale')
                            ->image()
                            ->directory('association')
                            ->visibility('public')
                            ->moveFiles()
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->maxSize(5120),

                        Forms\Components\Grid::make(2)
                            ->schema([
                                FileUpload::make('photo_secondaire_1_association')
                                    ->label('Photo secondaire 1')
                                    ->image()
                                    ->directory('association')
                                    ->visibility('public')
                                    ->moveFiles()
                                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                                    ->maxSize(5120),

                                FileUpload::make('photo_secondaire_2_association')
                                    ->label('Photo secondaire 2')
                                    ->image()
                                    ->directory('association')
                                    ->visibility('public')
                                    ->moveFiles()
                                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                                    ->maxSize(5120),
                            ]),
                    ]),
            ]);
    }
}
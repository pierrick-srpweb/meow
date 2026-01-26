<?php

namespace App\Filament\Pages;

use App\Settings\PageSettings;
use Filament\Forms\Components\FileUpload;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AccueilPage extends SettingsPage
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-home';

    protected static string|\UnitEnum|null $navigationGroup = 'Page';

    protected static ?string $navigationLabel = 'Accueil';

    protected static string $settings = PageSettings::class;

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('L\'Association')
                    ->schema([
                        FileUpload::make('photo_principale_association')
                            ->label('Photo principale')
                            ->image()
                            ->directory('association')
                            ->visibility('public')
                            ->moveFiles()
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->maxSize(5120),

                        Grid::make(2)
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

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChatResource\Pages;
use App\Models\Chat;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class ChatResource extends Resource
{
    protected static ?string $model = Chat::class;

    protected static ?string $slug = 'chats';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Toggle::make('est_publie')
                    ->onColor('success')
                    ->columnSpanFull(),

                TextInput::make('nom')
                    ->required(),

                SpatieMediaLibraryFileUpload::make('cv')->collection('cv')->required(),

                Select::make('sexe')
                ->options([
                    'Mâle' => 'male',
                    'Femelle' => 'femelle',
                ]),

                SpatieMediaLibraryFileUpload::make('photos')
                    ->multiple()
                    ->reorderable()
                    ->collection('photos'),

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



            /* DatePicker::make('vaccination'),

                TextInput::make('numero_puce'),

                DatePicker::make('antipuce'),

                DatePicker::make('vermifuge'),

                DatePicker::make('adoption'),*/







                Placeholder::make('created_at')
                    ->label('Created Date')
                    ->content(fn(?Chat $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                Placeholder::make('updated_at')
                    ->label('Last Modified Date')
                    ->content(fn(?Chat $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nom'),

                TextColumn::make('sexe'),

                TextColumn::make('date_naissance')
                    ->since(),

                TextColumn::make('categorie')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Adulte' => 'info',
                        'Senior' => 'danger',
                        'Chaton' => 'warning',
                        'Adopté' => 'success',
                        'Etoile' => 'gray',
                    }),

                ToggleColumn::make('ok_chien'),

                ToggleColumn::make('ok_enfant'),

                ToggleColumn::make('litiere'),

                ToggleColumn::make('est_publie'),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListChats::route('/'),
            'create' => Pages\CreateChat::route('/create'),
            'edit' => Pages\EditChat::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return [];
    }
}

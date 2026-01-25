<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TemoignageResource\Pages;
use App\Models\Temoignage;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TemoignageResource extends Resource
{
    protected static ?string $model = Temoignage::class;

    protected static ?string $slug = 'temoignages';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->columns(1)
                    ->schema([
                        Select::make('chat_id')
                            ->relationship(name: 'chat', titleAttribute: 'nom'),

                        RichEditor::make('contenu')
                            ->required(),

                        TextInput::make('famille')
                            ->required(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('chat.nom'),

                TextColumn::make('famille'),

                TextColumn::make('contenu')
                    ->html()
                    ->lineClamp(2),
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
            'index' => Pages\ListTemoignages::route('/'),
            'create' => Pages\CreateTemoignage::route('/create'),
            'edit' => Pages\EditTemoignage::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return [];
    }
}

<?php

namespace App\Filament\Resources\Temoignages;

use App\Filament\Resources\Temoignages\Pages\CreateTemoignage;
use App\Filament\Resources\Temoignages\Pages\EditTemoignage;
use App\Filament\Resources\Temoignages\Pages\ListTemoignages;
use App\Filament\Resources\Temoignages\Schemas\TemoignageForm;
use App\Filament\Resources\Temoignages\Tables\TemoignagesTable;
use App\Models\Temoignage;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TemoignageResource extends Resource
{
    protected static ?string $model = Temoignage::class;

    protected static ?string $slug = 'temoignages';

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Schema $schema): Schema
    {
        return TemoignageForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TemoignagesTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTemoignages::route('/'),
            'create' => CreateTemoignage::route('/create'),
            'edit' => EditTemoignage::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return [];
    }
}

<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Spatie\Activitylog\Models\Activity;

class LogsPage extends Page implements HasTable
{
    use InteractsWithTable;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $navigationLabel = 'Logs';

    protected static ?string $title = 'Journal d\'activité';

    protected static string|\UnitEnum|null $navigationGroup = 'Gestion';

    protected string $view = 'filament.pages.logs';

    public static function canAccess(): bool
    {
        return auth()->user()->isAdminOrDeveloppeur();
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(Activity::query()->latest())
            ->columns([
                TextColumn::make('created_at')
                    ->label('Date')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),

                TextColumn::make('causer.name')
                    ->label('Utilisateur')
                    ->default('Système')
                    ->sortable(),

                TextColumn::make('description')
                    ->label('Action')
                    ->wrap()
                    ->searchable(),

                TextColumn::make('subject_type')
                    ->label('Type')
                    ->formatStateUsing(fn (?string $state): string => match ($state) {
                        'App\Models\Chat' => 'Chat',
                        'App\Models\User' => 'Utilisateur',
                        'App\Models\Temoignage' => 'Témoignage',
                        null => 'Paramètres',
                        default => $state,
                    })
                    ->sortable(),

                TextColumn::make('modifications')
                    ->label('Modifications')
                    ->state(function (Activity $record): string {
                        $properties = $record->properties->toArray();

                        if (empty($properties) || ! isset($properties['attributes'])) {
                            return '-';
                        }

                        $ignored = ['updated_at', 'created_at'];
                        $parts = [];

                        foreach ($properties['attributes'] as $key => $value) {
                            if (in_array($key, $ignored, true)) {
                                continue;
                            }

                            $old = $properties['old'][$key] ?? null;
                            $displayValue = self::formatLogValue($value);
                            $displayOld = self::formatLogValue($old);

                            if ($old !== null) {
                                $parts[] = "{$key}: {$displayOld} → {$displayValue}";
                            } else {
                                $parts[] = "{$key}: {$displayValue}";
                            }
                        }

                        return implode(', ', $parts) ?: '-';
                    })
                    ->wrap()
                    ->toggleable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->paginated([25, 50, 100]);
    }

    private static function formatLogValue(mixed $value): string
    {
        if (is_null($value)) {
            return 'vide';
        }

        if (is_bool($value)) {
            return $value ? 'oui' : 'non';
        }

        if (is_array($value)) {
            return json_encode($value, JSON_UNESCAPED_UNICODE);
        }

        return (string) $value;
    }
}

<?php

namespace App\Filament\Resources\Chats\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class ChatsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nom')
                    ->sortable()->searchable(),

                TextColumn::make('sexe'),

                TextColumn::make('date_naissance')
                    ->label('Age')
                    ->formatStateUsing(function (string $state): string {
                        $age = Carbon::parse($state)->age;
                        if ($age >= 1) {
                            return $age.($age === 1 ? ' an' : ' ans');
                        }

                        $mois = floor(Carbon::parse($state)->floatDiffInMonths());

                        return $mois.' mois';
                    })
                    ->sortable(),

                TextColumn::make('categorie')
                    ->label('Catégorie')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Adulte' => 'info',
                        'Senior' => 'danger',
                        'Chaton' => 'warning',
                        'Adopté' => 'success',
                        'Etoile' => 'gray',
                    })
                    ->sortable(),

                IconColumn::make('ok_chien')
                    ->boolean(),

                IconColumn::make('ok_enfant')
                    ->boolean(),

                IconColumn::make('litiere')
                    ->label('Propre')
                    ->boolean(),

                IconColumn::make('est_publie')
                    ->label('Est publié')
                    ->boolean(),
            ])
            ->filters([
                Filter::make('categorie')
                    ->schema([
                        Select::make('categorie_filter')
                            ->label('Catégorie')
                            ->options([
                                'Adoptable' => 'Adoptable',
                                'Adopté' => 'Adopté',
                                'Etoile' => 'Etoile',
                            ])
                            ->reactive()
                            ->afterStateUpdated(function (callable $set, $state): void {
                                if ($state !== 'Adoptable') {
                                    $set('adoptable_filter', null);
                                }
                            }),
                        Select::make('adoptable_filter')
                            ->label('Catégorie adoptable')
                            ->options([
                                'Adulte' => 'Adulte',
                                'Chaton' => 'Chaton',
                                'Senior' => 'Senior',
                            ])
                            ->hidden(fn (Get $get): bool => $get('categorie_filter') !== 'Adoptable'),
                    ])
                    ->columns(2)
                    ->query(fn(Builder $query, array $data): Builder => $query
                        ->when(
                            $data['categorie_filter'],
                            function (Builder $query, $categorie): Builder {
                                if ($categorie !== 'Adoptable') {
                                    return $query->where('categorie', $categorie);
                                }

                                return $query->whereIn('categorie', ['Adulte', 'Chaton', 'Senior']);
                            }
                        )
                        ->when(
                            $data['adoptable_filter'],
                            fn(Builder $query, $categorie): Builder => $query->where('categorie', $categorie)
                        )),
            ], layout: FiltersLayout::AboveContent)
            ->filtersFormColumns(3)
            ->deferFilters(false)
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

<?php

namespace App\Filament\Resources\Offerings\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class OfferingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
            TextColumn::make('user.name')
                ->label('First Name')
                ->searchable()
                ->sortable(),

            TextColumn::make('user.last_name')
                ->label('Last Name')
                ->searchable()
                ->sortable(),

            TextColumn::make('total_amount')
                ->money('KES')
                ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
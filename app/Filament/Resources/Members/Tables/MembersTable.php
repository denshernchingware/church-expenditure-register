<?php

namespace App\Filament\Resources\Members\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MembersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                 TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('surname')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->searchable()
                    ->copyable(),

                TextColumn::make('phone')
                    ->searchable(),

                TextColumn::make('nyika')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('tabhera')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('cell')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('address')
                    ->limit(30) // short preview
                    ->tooltip(fn ($record) => $record->address),

                TextColumn::make('created_at')
                    ->label('Registered')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])

            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])

            ->defaultSort('name');
       
    }
}

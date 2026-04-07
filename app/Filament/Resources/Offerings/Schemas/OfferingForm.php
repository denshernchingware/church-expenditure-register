<?php

namespace App\Filament\Resources\Offerings\Schemas;

use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class OfferingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([


            Section::make('Offering Details')

                ->schema([
                DatePicker::make('date')
                    ->required()
                    ->default(now()),

                Select::make('user_id')
                    ->label('Member')
                    ->options(
                        User::all()->mapWithKeys(fn($user) => [
                            $user->id => $user->name . ' ' . $user->last_name
                        ])
                    )
                    ->searchable()
                    ->required(),

                    Repeater::make('items')
                        ->relationship() // Offering hasMany OfferingItem
                    ->live()
                    ->afterStateUpdated(fn($get, $set) => self::updateTotal($set, $get))
                    ->schema([

                            TextInput::make('type')
                                ->label('Name')
                                ->required(),

                        //     TextInput::make('amount')
                        //         ->numeric()
                        //         ->required()
                        //         ->reactive()
                        //     ->live()
                        // ->afterStateUpdated(function ($state, $set) {
                        //     $total = collect($state)
                        //         ->sum(fn($item) => (float) ($item['amount'] ?? 0));

                        //     $set('total_amount', $total);
                        TextInput::make('amount')
                            ->numeric()
                            ->required()
                            ->live()
                            ->afterStateUpdated(function ($get, $set) {
                                $items = $get('items') ?? [];

                                $total = collect($items)
                                    ->sum(fn($item) => (float) ($item['amount'] ?? 0));

                                $set('total_amount', $total);
                          
                        })

                        ])
                        ->columns(2)
                        ->defaultItems(1)
                        ->createItemButtonLabel('Add Item'),

                    TextInput::make('total_amount')
                        ->label('Total')
                        ->disabled()
                        ->dehydrated(true)
                        ->prefix('₹ '),

                ])
            ]);
    }
    public static function updateTotal($set, $get)
    {
        $items = $get('items') ?? [];

        $total = collect($items)
            ->sum(fn($item) => (float) ($item['amount'] ?? 0));

        $set('total_amount', $total);
    }
}
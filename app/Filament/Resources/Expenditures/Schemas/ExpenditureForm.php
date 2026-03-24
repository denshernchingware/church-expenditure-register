<?php

namespace App\Filament\Resources\Expenditures\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ExpenditureForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Expenditure Details')
                    ->schema([
                        DatePicker::make('date')
                            ->required()
                            ->default(now()),

                        Textarea::make('details')
                            ->required()
                            ->rows(3),

                        TextInput::make('amount')
                            ->numeric()
                            ->required()
                            ->prefix('KES'),

                        TextInput::make('income')
                            ->label('Income')
                            ->disabled()
                            ->dehydrated(false)
                            ->prefix('KES'),

                        TextInput::make('balance')
                            ->label('Balance')
                            ->disabled()
                            ->dehydrated(false)
                            ->prefix('KES'),
                    ])
            ]);
    }
}

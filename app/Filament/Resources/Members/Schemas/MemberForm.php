<?php

namespace App\Filament\Resources\Members\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class MemberForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Personal Info')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('last_name')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('email')
                            ->email()
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),

                        TextInput::make('phone')
                            ->tel()
                            ->maxLength(20),

                        TextInput::make('nyika')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('tabhera')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('cell')
                            ->required()
                            ->maxLength(255),

                        Textarea::make('address')
                            ->rows(2)
                            ->maxLength(500),
                    ])->columns(2),

                Section::make('Account Password')
                    ->schema([
                        TextInput::make('password')
                            ->password()
                            ->revealable()
                            ->required(fn(string $operation) => $operation === 'create')
                            ->dehydrateStateUsing(fn($state) => filled($state) ? bcrypt($state) : null)
                            ->dehydrated(fn($state) => filled($state))
                            ->minLength(8)
                            ->hint('Leave blank when editing to keep current password'),
                    ])->columns(1),
            ]);
    }
}

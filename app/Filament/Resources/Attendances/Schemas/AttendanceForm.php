<?php

namespace App\Filament\Resources\Attendances\Schemas;

use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AttendanceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Attendance Details')
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

                        Select::make('status')
                            ->options([
                                'present' => 'Present',
                                'absent' => 'Absent',
                            ])
                            ->default('present')
                            ->required(),
                    ])
            ]);
    }
}

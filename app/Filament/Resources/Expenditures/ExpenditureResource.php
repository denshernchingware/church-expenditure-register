<?php

namespace App\Filament\Resources\Expenditures;

use App\Filament\Resources\Expenditures\Pages\CreateExpenditure;
use App\Filament\Resources\Expenditures\Pages\EditExpenditure;
use App\Filament\Resources\Expenditures\Pages\ListExpenditures;
use App\Filament\Resources\Expenditures\Schemas\ExpenditureForm;
use App\Filament\Resources\Expenditures\Tables\ExpendituresTable;
use App\Models\Expenditure;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ExpenditureResource extends Resource
{
    protected static ?string $model = Expenditure::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return ExpenditureForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ExpendituresTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListExpenditures::route('/'),
            'create' => CreateExpenditure::route('/create'),
            'edit' => EditExpenditure::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources\Expenditures\Pages;

use App\Filament\Resources\Expenditures\ExpenditureResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListExpenditures extends ListRecords
{
    protected static string $resource = ExpenditureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

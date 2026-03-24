<?php

namespace App\Filament\Resources\Expenditures\Pages;

use App\Filament\Resources\Expenditures\ExpenditureResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditExpenditure extends EditRecord
{
    protected static string $resource = ExpenditureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\Expenditures\Pages;

use App\Filament\Resources\Expenditures\ExpenditureResource;
use Filament\Resources\Pages\CreateRecord;

class CreateExpenditure extends CreateRecord
{
    protected static string $resource = ExpenditureResource::class;
}

<?php

namespace App\Filament\Resources\Offerings\Pages;

use App\Filament\Resources\Offerings\OfferingResource;
use Filament\Resources\Pages\CreateRecord;

class CreateOffering extends CreateRecord
{
    protected static string $resource = OfferingResource::class;

    protected function afterCreate(): void
    {
        $total = $this->record->items()->sum('amount');

        $this->record->update([
            'total_amount' => $total,
        ]);
    }
}
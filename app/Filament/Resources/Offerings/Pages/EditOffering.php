<?php

namespace App\Filament\Resources\Offerings\Pages;

use App\Filament\Resources\Offerings\OfferingResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditOffering extends EditRecord
{
    protected static string $resource = OfferingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function afterCreate(): void
    {
        $total = $this->record->items()->sum('amount');

        $this->record->update([
            'total_amount' => $total,
        ]);
    }
}
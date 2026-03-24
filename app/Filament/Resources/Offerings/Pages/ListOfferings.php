<?php

namespace App\Filament\Resources\Offerings\Pages;

use App\Filament\Pages\OfferingReport;
use App\Filament\Resources\Offerings\OfferingResource;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListOfferings extends ListRecords
{
    protected static string $resource = OfferingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
            Action::make('view-report')
                ->label('View Report')
                ->url(OfferingReport::getUrl())
                ->icon('heroicon-o-chart-bar'),
        ];
    }
}

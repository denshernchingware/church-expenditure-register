<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\MembersTableWidget;
use App\Filament\Widgets\StatsOverviewWidget;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    public function getWidgets(): array
    {
        return [
            StatsOverviewWidget::class,
            MembersTableWidget::class,
        ];
    }

    public function getColumns(): int|array
    {
        return [
            'md' => 1,
            'xl' => 1,
        ];
    }
}

<?php

namespace App\Filament\Widgets;

use App\Models\Attendance;
use App\Models\Expenditure;
use App\Models\Offering;
use App\Models\OfferingItem;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $totalMembers   = User::count();
        $totalOfferings = OfferingItem::sum('amount');
        $totalExpended  = Expenditure::sum('amount');
        $currentBalance = $totalOfferings - $totalExpended;
        $offeringCount  = Offering::count();
        $presentToday   = Attendance::whereDate('date', today())->where('status', 'present')->count();

        return [
            Stat::make('Total Members', $totalMembers)
                ->description('Registered church members')
                ->descriptionIcon('heroicon-m-users')
                ->color('primary'),

            Stat::make('Total Offerings', 'KES ' . number_format($totalOfferings, 2))
                ->description($offeringCount . ' offering records')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('success'),

            Stat::make('Total Expenditure', 'KES ' . number_format($totalExpended, 2))
                ->description('All recorded expenses')
                ->descriptionIcon('heroicon-m-receipt-percent')
                ->color('danger'),

            Stat::make('Current Balance', 'KES ' . number_format($currentBalance, 2))
                ->description('Cash in hand')
                ->descriptionIcon('heroicon-m-currency-dollar')
                ->color($currentBalance >= 0 ? 'success' : 'danger'),

            Stat::make('Offering Sessions', $offeringCount)
                ->description('Total offering entries')
                ->descriptionIcon('heroicon-m-clipboard-document-list')
                ->color('warning'),

            Stat::make('Present Today', $presentToday)
                ->description('Attendance for ' . now()->format('d M Y'))
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('info'),
        ];
    }
}

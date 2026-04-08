<?php

namespace App\Filament\Pages;


use App\Models\Offering;
use Filament\Pages\Page;
use Illuminate\Support\Facades\DB;
use Filament\Support\Icons\Heroicon;
use BackedEnum;
use UnitEnum;

class OfferingReport extends Page
{
    protected string $view = 'filament.pages.offering-report';

    protected static ?string $title = 'Offering Report';
    protected static string|UnitEnum|null $navigationGroup = 'Finance';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public $offerings;
    public $types;
    public $topOfferingsByMember;
    public $monthlyFinancials;

    public function mount()
    {
        $this->offerings = Offering::with(['user', 'items'])->get();

        $this->types = DB::table('offering_items')
            ->select('type')
            ->distinct()
            ->pluck('type')
            ->toArray();

        $this->topOfferingsByMember = DB::table('offerings')
            ->join('offering_items', 'offerings.id', '=', 'offering_items.offering_id')
            ->join('users', 'offerings.user_id', '=', 'users.id')
            ->select(DB::raw("COALESCE(users.name, 'Unknown') as name"), DB::raw('SUM(offering_items.amount) as total'))
            ->groupBy('users.name')
            ->orderByDesc('total')
            ->limit(10)
            ->get();

        $this->monthlyFinancials = DB::table('expenditures')
            ->select(
                DB::raw("strftime('%Y-%m', date) as month"),
                DB::raw('SUM(amount) as total_expenditure')
            )
            ->groupBy('month')
            ->orderBy('month', 'desc')
            ->limit(12)
            ->get()
            ->map(function ($exp) {
                $offering = DB::table('offerings')
                    ->join('offering_items', 'offerings.id', '=', 'offering_items.offering_id')
                    ->whereRaw("strftime('%Y-%m', offerings.date) = ?", [$exp->month])
                    ->sum('offering_items.amount');

                return (object) [
                    'month' => $exp->month,
                    'total_expenditure' => $exp->total_expenditure,
                    'total_offering' => $offering,
                    'balance' => $offering - $exp->total_expenditure,
                ];
            });
    }
}

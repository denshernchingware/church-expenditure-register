<?php

namespace App\Filament\Pages;

use App\Models\Offering;
use Filament\Pages\Page;
use Illuminate\Support\Facades\DB;
use Filament\Support\Icons\Heroicon;
use BackedEnum;

class OfferingReport extends Page
{
    protected string $view = 'filament.pages.offering-report';

    protected static ?string $title = 'Offering Report';



    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public $offerings;
    public $types;

    public function mount()
    {
        $this->offerings = Offering::with(['user', 'items'])->get();

        $this->types = DB::table('offering_items')
            ->select('type')
            ->distinct()
            ->pluck('type')
            ->toArray();
    }
}

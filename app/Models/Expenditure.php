<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenditure extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'details',
        'amount',
        'income',
        'balance',
    ];

    protected $casts = [
        'date'    => 'date',
        'amount'  => 'decimal:2',
        'income'  => 'decimal:2',
        'balance' => 'decimal:2',
    ];

    /**
     * Calculate and store income + balance before saving a new expenditure.
     * Income = Total offerings so far − Total of ALL previous expenditures
     * Balance = Income − Current expenditure amount
     */
    protected static function booted(): void
    {
        static::creating(function (Expenditure $expenditure) {
            $totalOfferings = OfferingItem::sum('amount');

            // Sum all expenditures that exist before this one (no id yet, so sum all)
            $totalPreviousExp = Expenditure::sum('amount');

            $income  = $totalOfferings - $totalPreviousExp;
            $balance = $income - $expenditure->amount;

            $expenditure->income  = $income;
            $expenditure->balance = $balance;
        });

        static::updating(function (Expenditure $expenditure) {
            // Recalculate for records before this one
            $totalOfferings   = OfferingItem::sum('amount');
            $totalPreviousExp = Expenditure::where('id', '<', $expenditure->id)->sum('amount');

            $income  = $totalOfferings - $totalPreviousExp;
            $balance = $income - $expenditure->amount;

            $expenditure->income  = $income;
            $expenditure->balance = $balance;
        });
    }

    /**
     * Recalculate all expenditure records in order.
     * Call this after any offering or expenditure change.
     */
    public static function recalculateAll(): void
    {
        $expenditures = self::orderBy('date')->orderBy('id')->get();
        $runningExp   = 0;
        $totalOfferings = OfferingItem::sum('amount');

        foreach ($expenditures as $exp) {
            $income  = $totalOfferings - $runningExp;
            $balance = $income - $exp->amount;

            $exp->income  = $income;
            $exp->balance = $balance;
            $exp->saveQuietly(); // avoid re-triggering the observer

            $runningExp += $exp->amount;
        }
    }
}

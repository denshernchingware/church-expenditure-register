<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offering extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date',
        'total_amount',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OfferingItem::class);
    }

    public function getTotalAttribute(): float
    {
        return $this->items->sum('amount');
    }

    public function getChairsAmountAttribute(): float
    {
        return $this->items->where('type', 'chairs')->sum('amount');
    }

    public function getWindowsAmountAttribute(): float
    {
        return $this->items->where('type', 'windows')->sum('amount');
    }

    public function getTithingAmountAttribute(): float
    {
        return $this->items->where('type', 'tithing')->sum('amount');
    }

    public function getGeneralAmountAttribute(): float
    {
        return $this->items->where('type', 'general')->sum('amount');
    }
    // protected static function booted()
    // {
    //     static::saving(function ($offering) {
    //         $offering->total_amount = $offering->items->sum('amount');
    //     });
    // }
    
   
}
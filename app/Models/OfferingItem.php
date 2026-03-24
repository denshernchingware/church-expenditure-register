<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferingItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'offering_id',
        'type',
        'amount',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
    ];

    public const TYPES = [
        'chairs'  => 'Chairs',
        'windows' => 'Windows',
        'tithing' => 'Tithing',
        'general' => 'General',
        'harvest' => 'Harvest',
        'building' => 'Building Fund',
        'other'   => 'Other',
    ];

    public function offering()
    {
        return $this->belongsTo(Offering::class);
    }
}

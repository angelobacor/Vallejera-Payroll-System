<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HolidayPaymentIncrease extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'multiplier',
        'date'
    ];
}

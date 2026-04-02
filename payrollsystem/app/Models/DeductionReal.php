<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeductionReal extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'deduction_name',
        'amount',
        'expected_end_date'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeductionPaid extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'user_id',
        'deduction_name',
        'amount'
    ];
}

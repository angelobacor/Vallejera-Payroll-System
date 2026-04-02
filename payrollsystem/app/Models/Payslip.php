<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Payrun;

class Payslip extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'payrun_id',
        'payrun_period',
        'payrun_type',
        'status',
        'total_salary',
        'net_salary',
        'condition',
        'sss',
        'pagibig',
        'philhealth',
        'tax_income',
        'month_range'
    ];

    public function employee()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function payrun()
    {
        return $this->belongsTo(Payrun::class, 'payrun_id', 'id');
    }
}

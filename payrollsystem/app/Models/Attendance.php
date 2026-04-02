<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'date',
        'punched_in',
        'punched_out',
        'behavior',
        'type',
        'total_hours',
        'entry',
        'status',
        'amount',
    ];

    public function employee()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

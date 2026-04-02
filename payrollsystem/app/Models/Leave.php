<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Leave extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'start_date',
        'end_date',
        'leave_type',
        'status',
        'activity',
        'duration'
    ];

    public function employee()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

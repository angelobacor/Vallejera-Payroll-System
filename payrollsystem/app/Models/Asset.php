<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'asset_name',
        'asset_code',
        'serial_no',
        'condition',
        'type',
        'date',
        'note'
    ];
}

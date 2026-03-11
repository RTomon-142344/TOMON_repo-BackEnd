<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolDay extends Model
{
    protected $fillable = [
        'date',
        'type',
        'label',
        'attendance_count',
    ];

    protected $casts = [
        'date' => 'date',
    ];
}
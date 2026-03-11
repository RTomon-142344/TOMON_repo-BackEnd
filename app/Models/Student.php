<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'student_number',
        'first_name',
        'last_name',
        'email',
        'gender',
        'department',
        'enrolled_at',
    ];

    protected $casts = [
        'enrolled_at' => 'date',
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'enrollments')->withTimestamps();
    }
}
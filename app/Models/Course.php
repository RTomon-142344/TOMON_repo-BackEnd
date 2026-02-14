<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Course extends Model
{
    protected $fillable = [
        'course_code',
        'course_name',
        'capacity'
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'enrollments')->withTimestamps();
    }
}

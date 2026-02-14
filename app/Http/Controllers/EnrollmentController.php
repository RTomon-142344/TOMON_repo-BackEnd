<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;

class EnrollmentController extends Controller
{
    public function create()
    {
        $students = Student::all();
        $courses = Course::all();

        return view('enrollments.create', [
            'students' => $students,
            'courses' => $courses
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id'
        ]);

        $student = Student::findOrFail($request->student_id);
        $course = Course::findOrFail($request->course_id);

        if ($student->courses()->where('course_id', $course->id)->exists()) {
            return back()->with('error', 'Student already enrolled in this course.');
        }

        if ($course->students()->count() >= $course->capacity) {
            return back()->with('error', 'Course is already full.');
        }

        $student->courses()->attach($course->id);

        return back()->with('success', 'Enrollment successful.');
    }
}

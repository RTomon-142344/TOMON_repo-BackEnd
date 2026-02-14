<?php

namespace App\Http\Controllers;

use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', ['courses' => $courses]);
    }

    public function show($id)
    {
        $course = Course::with('students')->findOrFail($id);
        return view('courses.show', ['course' => $course]);
    }
}

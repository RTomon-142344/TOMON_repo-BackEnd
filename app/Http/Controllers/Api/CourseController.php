<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;

class CourseController extends Controller
{
    // GET /api/courses
    public function index()
    {
        $courses = Course::withCount('students')->orderBy('course_code')->get();
        return response()->json($courses);
    }

    // GET /api/courses/{id}
    public function show($id)
    {
        $course = Course::with('students')->findOrFail($id);
        return response()->json($course);
    }
}
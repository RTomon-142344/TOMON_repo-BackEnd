<?php

namespace App\Http\Controllers;

use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', ['students' => $students]);
    }

    public function show($id)
    {
        $student = Student::with('courses')->findOrFail($id);
        return view('students.show', ['student' => $student]);
    }
}

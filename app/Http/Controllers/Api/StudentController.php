<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // GET /api/students
    public function index(Request $request)
    {
        $query = Student::with('courses');

        if ($request->search) {
            $q = $request->search;
            $query->where(function ($qb) use ($q) {
                $qb->where('first_name', 'like', "%$q%")
                   ->orWhere('last_name', 'like', "%$q%")
                   ->orWhere('student_number', 'like', "%$q%")
                   ->orWhere('email', 'like', "%$q%");
            });
        }

        if ($request->department) {
            $query->where('department', $request->department);
        }

        $students = $query->orderBy('last_name')->paginate(20);
        return response()->json($students);
    }

    // GET /api/students/{id}
    public function show($id)
    {
        $student = Student::with('courses')->findOrFail($id);
        return response()->json($student);
    }
}
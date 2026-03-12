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

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('first_name',      'like', "%{$search}%")
                  ->orWhere('last_name',     'like', "%{$search}%")
                  ->orWhere('email',         'like', "%{$search}%")
                  ->orWhere('student_number','like', "%{$search}%");
            });
        }

        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        $students = $query->orderBy('last_name')->paginate($request->get('per_page', 20));

        $students->getCollection()->transform(function ($student) {
            return [
                'id'             => $student->id,
                'student_number' => $student->student_number,
                'first_name'     => $student->first_name,
                'last_name'      => $student->last_name,
                'full_name'      => $student->first_name . ' ' . $student->last_name,
                'email'          => $student->email,
                'gender'         => $student->gender,
                'department'     => $student->department,
                'enrolled_at'    => $student->enrolled_at,
                // Use correct column names from courses migration: course_code, course_name
                'courses' => $student->courses->map(fn($c) => [
                    'id'   => $c->id,
                    'code' => $c->course_code,
                    'name' => $c->course_name,
                ]),
            ];
        });

        return response()->json($students);
    }

    // GET /api/students/{id}
    public function show($id)
    {
        $student = Student::with('courses')->findOrFail($id);

        return response()->json([
            'id'             => $student->id,
            'student_number' => $student->student_number,
            'first_name'     => $student->first_name,
            'last_name'      => $student->last_name,
            'full_name'      => $student->first_name . ' ' . $student->last_name,
            'email'          => $student->email,
            'gender'         => $student->gender,
            'department'     => $student->department,
            'enrolled_at'    => $student->enrolled_at,
            'courses'        => $student->courses->map(fn($c) => [
                'id'   => $c->id,
                'code' => $c->course_code,
                'name' => $c->course_name,
            ]),
        ]);
    }
}
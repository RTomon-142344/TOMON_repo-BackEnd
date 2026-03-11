<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Course;
use App\Models\SchoolDay;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    // ── GET /api/dashboard ───────────────────────────────────
    // Returns all data needed for the dashboard in one request
    public function index()
    {
        return response()->json([
            'stats'              => $this->stats(),
            'monthly_enrollment' => $this->monthlyEnrollment(),
            'course_distribution'=> $this->courseDistribution(),
            'attendance_trend'   => $this->attendanceTrend(),
        ]);
    }

    // ── Summary stats ────────────────────────────────────────
    private function stats(): array
    {
        return [
            'total_students' => Student::count(),
            'total_courses'  => Course::count(),
            'total_enrolled' => DB::table('enrollments')->distinct('student_id')->count(),
            'avg_attendance' => (int) SchoolDay::where('type', 'class')->avg('attendance_count'),
        ];
    }

    // ── Bar chart: monthly enrollment count ──────────────────
    private function monthlyEnrollment(): array
    {
        $rows = Student::selectRaw("DATE_FORMAT(enrolled_at, '%Y-%m') as month, COUNT(*) as count")
            ->whereNotNull('enrolled_at')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return $rows->map(fn($r) => [
            'month' => $r->month,
            'count' => $r->count,
        ])->toArray();
    }

    // ── Pie chart: students per department (course) ──────────
    private function courseDistribution(): array
    {
        $rows = Student::selectRaw('department, COUNT(*) as count')
            ->groupBy('department')
            ->orderByDesc('count')
            ->get();

        return $rows->map(fn($r) => [
            'name'  => $r->department,
            'value' => $r->count,
        ])->toArray();
    }

    // ── Line chart: daily attendance over school days ────────
    // Returns last 60 class days for readability
    private function attendanceTrend(): array
    {
        $rows = SchoolDay::where('type', 'class')
            ->orderBy('date')
            ->get(['date', 'attendance_count']);

        return $rows->map(fn($r) => [
            'date'  => $r->date->format('M d'),
            'count' => $r->attendance_count,
        ])->toArray();
    }
}
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\CourseController;

// ── Public routes ────────────────────────────────────────────
Route::post('/login',    [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// ── Protected routes ─────────────────────────────────────────
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user',    fn(Request $r) => $r->user());

    // Dashboard (all chart data in one call)
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Students
    Route::get('/students',     [StudentController::class, 'index']);
    Route::get('/students/{id}',[StudentController::class, 'show']);

    // Courses
    Route::get('/courses',      [CourseController::class, 'index']);
    Route::get('/courses/{id}', [CourseController::class, 'show']);
});

// ── Dev helper (remove in production) ────────────────────────
Route::get('/token-test', function () {
    $user = User::find(1);
    return $user?->createToken('test')->plainTextToken ?? 'No user found';
});
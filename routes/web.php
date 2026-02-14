<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/second', function(){
//    return view('second');
//});

Route::view('/second','second');

use App\Http\Controllers\PostController;

Route::get('/posts', [PostController::class, 'index']);
Route::get('/categories', [PostController::class, 'allCategories']);
Route::get('/categories/{id}', [PostController::class, 'showByCategory']);

use App\Http\Controllers\StudentController;

Route::get('/students', [StudentController::class, 'index']);
Route::get('/students/{id}', [StudentController::class, 'show']);

use App\Http\Controllers\CourseController;

Route::get('/courses', [CourseController::class, 'index']);
Route::get('/courses/{id}', [CourseController::class, 'show']);

use App\Http\Controllers\EnrollmentController;

Route::get('/enrollments/create', [EnrollmentController::class, 'create']);
Route::post('/enrollments', [EnrollmentController::class, 'store']);

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

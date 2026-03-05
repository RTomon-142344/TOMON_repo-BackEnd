<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\Api\AuthController;

Route::get('/token-test', function (){
    $user = User::find(1);
    return $user->createToken('test')->plainTextToken;
});

Route::post('/login', [AuthController::class, 'login']);
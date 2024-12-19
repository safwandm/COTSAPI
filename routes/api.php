<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::middleware('auth:sanctum')->get('/protected', function () {
    return response()->json(['message' => 'This is a protected route'], 200);
});

Route::get('/check-db', function () {
    return [
        'files' => scandir(database_path()),
        'exists' => file_exists(database_path('database.sqlite'))
    ];

    // return 'test';
});
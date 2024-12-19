<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return [
        'files' => scandir(database_path()),
        'exists' => file_exists(database_path('database.sqlite'))
    ];
});

use App\Http\Controllers\GenericCrudController;
// ->where('model', 'motors|transaksis|ulasans')

Route::prefix('{model}')->group(function () {
    Route::get('/', [GenericCrudController::class, 'index']);
    Route::get('/{id}', [GenericCrudController::class, 'show']);
    Route::post('/', [GenericCrudController::class, 'store']);
    Route::put('/{id}', [GenericCrudController::class, 'update']);
    Route::delete('/{id}', [GenericCrudController::class, 'destroy']);
});
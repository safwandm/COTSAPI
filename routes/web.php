<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return [
        'files' => scandir(database_path()),
        'exists' => file_exists(database_path('database.sqlite'))
    ];
});

<?php

declare(strict_types=1);

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/home', HomeController::class)->name('home');
    Route::resource('/projects', ProjectController::class)->only([
        'store', 'show', 'edit', 'update', 'delete',
    ]);
});

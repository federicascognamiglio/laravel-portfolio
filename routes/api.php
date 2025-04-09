<?php

use App\Http\Controllers\Api\ProjectsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Index
Route::get('/projects', [ProjectsController::class, 'index']);

// Show
Route::get('/projects/{project}', [ProjectsController::class, 'show']);
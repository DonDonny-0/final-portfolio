<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\ProjectController;
use App\Http\Controllers\Api\V1\AdminController;

Route::prefix('v1')->middleware('auth:sanctum')->group(function () {
    Route::apiResource('projects', ProjectController::class)->except(['update']);
    Route::put('projects/{project}', [ProjectController::class, 'replace']);
    Route::patch('projects/{project}', [ProjectController::class, 'update']);
    Route::apiResource('admin', AdminController::class);
});
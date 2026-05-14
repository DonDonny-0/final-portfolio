<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Project;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\V1\ProjectController;

Route::prefix('v1')->group(function () {
    Route::middleware('auth:sanctum')->apiResource('projects', ProjectController::class);
});
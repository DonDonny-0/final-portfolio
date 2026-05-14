<?php

use Illuminate\Support\Facades\Route;
use App\Http\Resources\UserResource;
use App\Http\Controllers\Api\AuthController;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Project;

Route::get('/', function () {
    return Inertia::render('Homepage');
});

Route::get('/about', function () {
    return Inertia::render('About', [
        'user' => UserResource::make(User::first()),
    ]);
});

Route::get('/login', [AuthController::class, 'login']);
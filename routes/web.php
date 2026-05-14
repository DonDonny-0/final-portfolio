<?php

use Illuminate\Support\Facades\Route;
use App\Http\Resources\UserResource;
use Inertia\Inertia;
use App\Models\User;

Route::get('/', function () {
    return Inertia::render('Homepage');
});

Route::get('/about', function () {
    return Inertia::render('About', [
        'user' => UserResource::make(User::first()),
    ]);
});

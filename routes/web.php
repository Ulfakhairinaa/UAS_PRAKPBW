<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserEventController;
use App\Http\Controllers\RegistrationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/events', [UserEventController::class, 'index']);

Route::get('/events/{event}', [UserEventController::class, 'show']);

Route::post('/events/{event}/register', [RegistrationController::class, 'store']);

Route::get('/my-events', [RegistrationController::class, 'myEvents']);
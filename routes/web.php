<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/admin/events', [EventController::class, 'index']);
Route::get('/admin/events/create', [EventController::class, 'create']);
Route::post('/admin/events', [EventController::class, 'store']);
Route::get('/admin/events/{event}/edit', [EventController::class, 'edit']);
Route::put('/admin/events/{event}', [EventController::class, 'update']);
Route::delete('/admin/events/{event}', [EventController::class, 'destroy']);


use App\Http\Controllers\UserEventController;
use App\Http\Controllers\RegistrationController;

Route::get('/', function () {
    return redirect('/login');
});


Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', [AuthController::class, 'showRegister']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/user-login', [AuthController::class, 'userLogin']);
Route::post('/admin-login', [AuthController::class, 'adminLogin']);
Route::post('/logout', [AuthController::class, 'logout']);


Route::get('/events', [UserEventController::class, 'index']);

Route::get('/events/{event}', [UserEventController::class, 'show']);

Route::post('/events/{event}/register', [RegistrationController::class, 'store']);

Route::get('/my-events', [RegistrationController::class, 'myEvents']);


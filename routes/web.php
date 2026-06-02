<?php

use App\Http\Controllers\EventController;

Route::get('/admin/events', [EventController::class, 'index']);
Route::get('/admin/events/create', [EventController::class, 'create']);
Route::post('/admin/events', [EventController::class, 'store']);
Route::get('/admin/events/{event}/edit', [EventController::class, 'edit']);
Route::put('/admin/events/{event}', [EventController::class, 'update']);
Route::delete('/admin/events/{event}', [EventController::class, 'destroy']);
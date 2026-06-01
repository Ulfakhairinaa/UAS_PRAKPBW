<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/admin/participants', [DashboardController::class, 'participants']);
Route::get('/admin/participants/{event}', [DashboardController::class, 'showParticipants']);
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/events', [UserController::class, 'createEvent']);
Route::get('/events', [UserController::class, 'getEvents']);
Route::post('/events/{eventId}/participate', [UserController::class, 'participateEvent']);
Route::post('/events/{eventId}/cancel-participation', [UserController::class, 'cancelParticipation']);
Route::delete('/events/{eventId}', [UserController::class, 'removeEvent']);

<?php

use App\Http\Controllers\Api\EventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register-user', [AuthController::class, 'register']);
Route::post('/login-user', [AuthController::class, 'login']);

Route::post('/events', [EventController::class, 'create']);
Route::get('/events', [EventController::class, 'index']);
Route::post('/events/participate/{eventId}', [EventController::class, 'participate']);
Route::delete('/events/cancel-participation/{eventId}', [EventController::class, 'cancelParticipation']);
Route::delete('/events/delete/{eventId}', [EventController::class, 'deleteEvent']);
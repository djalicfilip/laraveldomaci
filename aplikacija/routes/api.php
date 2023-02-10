<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserReservationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\API\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });
Route::resource('reservations', ReservationController::class)->only(['update','store','destroy']);
Route::delete('/reservation/{id}', [ReservationController::class, 'delete']);
Route::put('/reservation/{id}', [ReservationController::class, 'updateById']);
Route::post('/reservation', [ReservationController::class, 'add']);
Route::get('/package/{id}/reservation', [ReservationController::class, 'packagereservation']);
Route::get('/users/{id}/reservations', [UserReservationController::class, 'index']);
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/logout', [AuthController::class, 'logout']);
});

Route::resource('reservations', ReservationController::class)->only(['index','show']);
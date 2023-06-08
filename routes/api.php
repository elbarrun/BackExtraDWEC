<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('/reservas/', [\App\Http\Controllers\ReservaController::class, 'index']);
Route::get('/reservas/{reserva}', [\App\Http\Controllers\ReservaController::class, 'show']);
Route::post('/reservas/', [\App\Http\Controllers\ReservaController::class, 'store']);
Route::get('/reservas/{reserva}/coche', [\App\Http\Controllers\ReservaController::class, 'show_coche']);
Route::get('/reservas/{reserva}/user', [\App\Http\Controllers\ReservaController::class, 'show_user']);
Route::delete('/reservas/{reserva}', [\App\Http\Controllers\ReservaController::class, 'destroy']);
Route::put('/reservas/{reserva}/{extra}', [\App\Http\Controllers\ReservaController::class, 'aniadirExtra']);
Route::get('/misreservas/', [\App\Http\Controllers\CocheController::class, 'misReservas']);

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::controller(AuthController::class)->group(function () { Route::post('login', 'login');
    Route::post('register', 'register'); Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
    Route::get('me', 'me');
});



Route::get('/coches/listado', [\App\Http\Controllers\CocheController::class, 'list']);
Route::get('/coches/', [\App\Http\Controllers\CocheController::class, 'index']);
Route::get('/coches/{id}', [\App\Http\Controllers\CocheController::class, 'show']);

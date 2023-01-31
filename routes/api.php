<?php

use App\Http\Controllers\loginController;
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

Route::post('/login', [loginController::class, 'login']);
Route::post('/logout', [loginController::class, 'logout'])->middleware('comprobar');
Route::get('/whoiam', [loginController::class, 'whoIam'])->middleware('comprobar');
Route::get('/all', [loginController::class, 'mostrar'])->middleware('comprobar');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

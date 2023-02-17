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

Route::post('register', [loginController::class, 'register']);
Route::post('/login', [loginController::class, 'login']);

Route::group(['middleware' => 'comprobar'], function () {
Route::post('/logout', [loginController::class, 'logout']);
Route::get('/whoiam', [loginController::class, 'whoIam']);
Route::get('/all', [loginController::class, 'mostrar']);
});


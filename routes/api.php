<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('refresh', [AuthController::class, 'refresh'])->name('refresh');
    Route::post('me', [AuthController::class, 'me'])->name('me');

});

Route::group(['middleware' => ['auth.jwt'], 'prefix' => 'users'], function () {
    // Solo el administrador puede crear, editar y eliminar usuarios
    Route::post('/createUser', [UserController::class, 'store'])->middleware('role:Administrador')->name('createUser');
    Route::put('/updateUser/{id}', [UserController::class, 'update'])->middleware('role:Administrador') ->name('updateUser');
    Route::delete('deleteUser/{id}', [UserController::class, 'destroy'])->middleware('role:Administrador') ->name('deleteUser');

    // Todos los usuarios autenticados pueden consultar datos
    Route::get('/getUsers', [UserController::class, 'index']);
    Route::get('/getUserById/{id}', [UserController::class, 'show']);
});

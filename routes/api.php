<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// apis de roles

Route::post('status', [\App\Http\Controllers\rolesController::class, 'create_status']);

Route::put('update-status', [\App\Http\Controllers\rolesController::class, 'update_status']);

Route::delete('delete-status', [\App\Http\Controllers\rolesController::class, 'delete_status']);

// apis de usuario

Route::post('crear-user', [\App\Http\Controllers\userController::class, 'crear_usuario']);

Route::get('obtener-usuario', [\App\Http\Controllers\userController::class, 'getUser']);

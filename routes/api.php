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
Route::delete('delete-status/{id}', [\App\Http\Controllers\rolesController::class, 'delete_status']);

// apis de usuario

Route::post('crear-user', [\App\Http\Controllers\userController::class, 'crear_usuario']);
Route::get('obtener-usuario', [\App\Http\Controllers\userController::class, 'getUser']);
Route::post('validate-user',[\App\Http\Controllers\userController::class, 'validateUser']);
Route::delete('delete-user/{id}', [\App\Http\Controllers\rolesController::class, 'delete_user']);
Route::put('update-user',[\App\Http\Controllers\userController::class, 'update_user']);


//apis de clientes
Route::post('crear-cliente',[\App\Http\Controllers\clienteController::class, 'create_cliente']);
Route::put('update-cliente',[\App\Http\Controllers\clienteController::class, 'update_cliente']);
Route::delete('delete-cliente/{id}',[\App\Http\Controllers\clienteController::class, 'delete_cliente']);
Route::get('obtener-cli',[\App\Http\Controllers\clienteController::class, 'getCliente']);
Route::get('validar-cliente',[\App\Http\Controllers\clienteController::class, 'ValidateCli']);


// apis reuniones
Route::post('crear-reunion',[\App\Http\Controllers\reunionController::class, 'create_reu']);
Route::put('actualizar-reunion',[\App\Http\Controllers\reunionController::class, 'update_reu']);
Route::delete('eliminar-reunion/{id}',[\App\Http\Controllers\reunionController::class, 'delete_reu']);
Route::get('get-reunion',[\App\Http\Controllers\reunionController::class, 'getReu']);

//api de asistencia 
Route::post('crear-asistencia',[\App\Http\Controllers\asistenciaController::class, 'create_asis']);
Route::delete('borrar-asistencia/',[\App\Http\Controllers\asistenciaController::class, 'delete_asis']);
Route::get('get-asis',[\App\Http\Controllers\asistenciaController::class, 'getAsis']);



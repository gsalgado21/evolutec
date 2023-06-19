<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\api\ProfissionalController;
use App\Http\Controllers\api\AtoController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/cadastrar_profissional', [ProfissionalController::class, 'store']);
Route::get('/mostrar_profissional/{id}', [ProfissionalController::class, 'show']);
Route::get('/lista_profissionais', [ProfissionalController::class, 'index']);
Route::put('/editar_profissional/{id}', [ProfissionalController::class, 'update']);
Route::delete('/delete_profissional/{id}', [ProfissionalController::class, 'destroy']);

Route::post('/cadastrar_ato', [AtoController::class, 'store']);
Route::get('/mostrar_ato/{id}', [AtoController::class, 'show']);
Route::get('/lista_atos', [AtoController::class, 'index']);
Route::put('/editar_ato/{id}', [AtoController::class, 'update']);
Route::delete('/delete_ato/{id}', [AtoController::class, 'destroy']);

Route::post('/cadastrar_avd', [AvdController::class, 'store']);
Route::get('/mostrar_avd/{id}', [AvdController::class, 'show']);
Route::get('/lista_avds', [AvdController::class, 'index']);
Route::put('/editar_avd/{id}', [AvdController::class, 'update']);
Route::delete('/delete_avd/{id}', [AvdController::class, 'destroy']);

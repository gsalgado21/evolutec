<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ProfissionalController;
use App\Http\Controllers\AvdController;
use App\Http\Controllers\CidController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeappController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [HomeController::class, 'index'])->name('welcome');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/pacientes', [PacienteController::class, 'index'])
->name('pacientes.index');
Route::get('/pacientes/create', [PacienteController::class, 'create'])
->name('pacientes.create');
Route::post('/pacientes', [PacienteController::class, 'store'])
->name('pacientes.store');
Route::get('/pacientes/{id}', [PacienteController::class, 'show'])
->name('pacientes.show');
Route::get('/pacientes/{id}/edit', [PacienteController::class, 'edit'])
->name('pacientes.edit');
Route::put('/pacientes/{id}', [PacienteController::class, 'update'])
->name('pacientes.update');
Route::delete('/pacientes/{id}', [PacienteController::class, 'destroy'])
->name('pacientes.destroy');
Route::get('/pacientes/{id}/graficos', [PacienteController::class, 'graficos'])
->name('pacientes.graficos');
Route::post('/relatorio/avd', [PacienteController::class, 'relatorioAvd'])
->name('relatorio.avd');



Route::get('/profissionais', [ProfissionalController::class, 'index'])
->name('profissionais.index');
Route::get('/profissionais/create', [ProfissionalController::class, 'create'])
->name('profissionais.create');
Route::post('/profissionais', [ProfissionalController::class, 'store'])
->name('profissionais.store');
Route::get('/profissionais/{id}', [ProfissionalController::class, 'show'])
->name('profissionais.show');
Route::get('/profissionais/{id}/edit', [ProfissionalController::class, 'edit'])
->name('profissionais.edit');
Route::put('/profissionais/{id}', [ProfissionalController::class, 'update'])
->name('profissionais.update');
Route::delete('/profissionais/{id}', [ProfissionalController::class, 'destroy'])
->name('profissionais.destroy');

Route::get('/avds', [AvdController::class, 'index'])
->name('avds.index');
Route::get('/avds/create', [AvdController::class, 'create'])
->name('avds.create');
Route::post('/avds', [AvdController::class, 'store'])
->name('avds.store');
Route::get('/avds/{id}', [AvdController::class, 'show'])
->name('avds.show');
Route::get('/avds/{id}/edit', [AvdController::class, 'edit'])
->name('avds.edit');
Route::put('/avds/{id}', [AvdController::class, 'update'])
->name('avds.update');
Route::delete('/avds/{id}', [AvdController::class, 'destroy'])
->name('avds.destroy');

Route::post('/pacientes/{paciente}/cids', [PacienteController::class, 'storeCid'])
->name('pacientes.cid.store');
Route::delete('/pacientes/{paciente}/cids/{cid}', [PacienteController::class, 'destroyCid'])
->name('pacientes.cid.destroy');
Route::post('/cids/import', [CidController::class, 'import'])->name('cids.import');
Route::get('/search/cid', [CidController::class, 'search']);

Route::get('/importcid', function () {
    return view('ferramentas/importcid');
});

Route::get('/pacientes/{paciente}/relatorios', [PacienteController::class, 'showRelatorios'])
->name('pacientes.relatorios');
Route::post('/pacientes/{paciente}/relatorios', [PacienteController::class, 'storeRelatorio'])
->name('pacientes.relatorios.store');


Route::get('/homeapp', [HomeappController::class, 'index'])->name('homeapp');
Route::post('/atosstore', [HomeappController::class, 'store'])->name('atos.store');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

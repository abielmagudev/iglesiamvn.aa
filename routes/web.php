<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutenticadoController;
use App\Http\Controllers\AutenticarController;
use App\Http\Controllers\CancionController;
use App\Http\Controllers\CantanteController;
use App\Http\Controllers\EscritorioController;
use App\Http\Controllers\InterpreteController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VersionController;

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


// Autenticado
Route::middleware(['web', 'auth'])->group(function () {
	
	Route::get('/', fn() => redirect()->route('escritorio.index'));
	Route::get('escritorio', EscritorioController::class)->name('escritorio.index');
	
	Route::resource('canciones', CancionController::class)->parameters(['canciones' => 'cancion']);
	
	Route::resource('cantantes', CantanteController::class);
	
	Route::resource('usuarios', UsuarioController::class);

	Route::prefix('interpretes')->group(function () {
		Route::get('{cancion}/create', [InterpreteController::class, 'create'])->name('interpretes.create');
		Route::post('{cancion}/create', [InterpreteController::class, 'store'])->name('interpretes.store');
		Route::get('{cancion}/edit/{cantante}', [InterpreteController::class, 'edit'])->name('interpretes.edit');
		Route::match(['put','patch'],'{cancion}/edit/{cantante}', [InterpreteController::class, 'update'])->name('interpretes.update');
		Route::delete('{cancion}/{cantante}', [InterpreteController::class, 'destroy'])->name('interpretes.destroy');
	});

	Route::prefix('versiones')->group(function () {
		Route::get('create/{cancion}', [VersionController::class, 'create'])->name('versiones.create');
		Route::post('create/{cancion}', [VersionController::class, 'store'])->name('versiones.store');
		Route::get('{version}/edit', [VersionController::class, 'edit'])->name('versiones.edit');
		Route::match(['put','patch'],'{version}/edit', [VersionController::class, 'update'])->name('versiones.update');
		Route::delete('{version}', [VersionController::class, 'destroy'])->name('versiones.destroy');
	});

	Route::get('cuenta/edit', [AutenticadoController::class, 'edit'])->name('autenticado.edit');
    Route::get('logout', [AutenticarController::class, 'logout'])->name('autenticar.logout');
    Route::match(['put','patch'], 'cuenta/edit', [AutenticadoController::class, 'update'])->name('autenticado.update');
});

// Invitado

Route::middleware(['web', 'guest'])->group(function () {
    Route::get('login', [AutenticarController::class, 'login'])->name('autenticar.login');
    Route::post('login', [AutenticarController::class, 'attempt'])->name('autenticar.attempt');
});

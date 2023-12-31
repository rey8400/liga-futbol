<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TorneoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('torneo',\App\Http\Controllers\TorneoController::class);
Route::resource('ubicacione',\App\Http\Controllers\UbicacioneController::class);
Route::resource('equipo',\App\Http\Controllers\EquipoController::class);
Route::resource('jugadore', \App\Http\Controllers\JugadoreController::class);
Route::resource('torneo/{torneo}/equiposinscrito', \App\Http\Controllers\EquiposinscritoController::class);
Route::resource('torneo/{torneo}/partido', \App\Http\Controllers\PartidoController::class);
Route::post('torneo/{torneo}/goles', [\App\Http\Controllers\PartidoController::class, 'goles'])->name('goles');

require __DIR__.'/auth.php';

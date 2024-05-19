<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/crear-documento', [HomeController::class, 'crearDocumento'])->name('crear-documento');

Route::post('/guardar-documento', [HomeController::class, 'guardarDocumento'])->name('guardar-documento');

Route::get('/procesos', [HomeController::class, 'obtenerProcesos']);

Route::get('/tipos', [HomeController::class, 'obtenerTipos']);

Route::get('/editar-documento/{id}', [HomeController::class, 'editarDocumento'])->name('editar-documento');

Route::put('/editar-documento/{id}', [HomeController::class, 'actualizarDocumento'])->name('actualizar-documento');

Route::get('/documento/{id}', [HomeController::class, 'obtenerDocumento']);
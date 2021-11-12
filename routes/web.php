<?php

use App\Http\Controllers\PerfilFillController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContatoController;


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

Route::any('/', [ContatoController::class, 'index']);

Route::resource('perfilFill', PerfilFillController::class);

require __DIR__.'/auth.php';

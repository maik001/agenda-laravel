<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ContactController::class, 'index'])->name('Home');

Route::get('/inserir', [ContactController::class, 'inserir']);

Route::post('/inserir', [ContactController::class, 'store']);

Route::put('/{contact}', [ContactController::class, 'update']);

Route::delete('/{contact}', [ContactController::class, 'destroy']);
<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\EktpController;
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


Route::get('/', [ProductController::class, 'index']);
Route::get('/ektp', [EktpController::class, 'index']);
Route::get('/example', [ProductController::class, 'downloadtemplate'])->name('template');

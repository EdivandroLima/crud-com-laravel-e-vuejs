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

Route::get('/produtos/search', [App\Http\Controllers\ProdutoController::class, 'search']);
Route::get('/produtos/produtos-relacionados', [App\Http\Controllers\ProdutoController::class, 'produtosRelacionados']);
Route::resource('/produtos', App\Http\Controllers\ProdutoController::class);





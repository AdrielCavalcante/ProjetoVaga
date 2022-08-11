<?php

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

use App\Http\Controllers\productsController;
use App\Http\Controllers\fabricantesControle;

Route::get('/', [productsController::class, 'ShowAll']);

Route::get('/fabricantes/create', function () {
    return view('fabricantes.create');
});

Route::get('/produtos/create', [fabricantesControle::class, 'Show']);

Route::post('/produtos', [productsController::class, 'Store']);

Route::post('/fabricantes', [fabricantesControle::class, 'Store']);

Route::delete('/produtos/{id}', [productsController::class, 'Destroy']);

Route::put('/produtos/update/{id}', [productsController::class, 'Update']);
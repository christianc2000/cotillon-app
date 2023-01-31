<?php

use App\Http\Controllers\Web\ContenedorController;
use App\Http\Controllers\Web\PrecioController;
use App\Http\Controllers\Web\ProductoController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => ["auth:sanctum"]], function () {
   Route::resource('/producto',ProductoController::class)->names('producto');
   Route::post('/producto/{id}/precio',[PrecioController::class,'storePrecioProducto'])->name('producto.precio');
   //CRUD PRODUCTO CONTENEDOR
   Route::post('/productoContenedor',[ProductoController::class,'storeContenedor'])->name('producto.contenedor.store');
   Route::resource('/contenedor',ContenedorController::class)->names('contenedor');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

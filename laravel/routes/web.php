<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productsController;

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
    return view('products.index');
});

Route::get('/comand', function(){
    return view('products.comandes');
});



Route::get('/', [productsController::class, 'index_all'])->name('products');
Route::post('/', [productsController::class, 'store'])->name('products');
Route::get('/products/{id}', [productsController::class, 'show'])->name('products-edit');
Route::patch('/products/{id}', [productsController::class, 'update'])->name('products-update');
<<<<<<< Updated upstream
Route::delete('/products/{id}', [productsController::class, 'destroy'])->name('products-destroy');
=======
Route::delete('/products/{id}', [productsController::class, 'destroy'])->name('products-destroy');

//COMANDES
Route::get('/comands', [OrderController::class,'comandes'])->name('comands');
>>>>>>> Stashed changes

<?php

<<<<<<< HEAD
use App\Http\Controllers\OrderController;
=======

>>>>>>> 0402cdc3e7cbb815fa1c5835c4651245baa53599
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productsController;
use App\Http\Controllers\TicketController;

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
Route::get('/tickets', function () {
    return view('tickets.index');
});

// Route::get('/comand', function(){
//     return view('products.comandes');
// });


<<<<<<< HEAD

Route::get('/comand', function(){
    return view('products.comandes');
});



=======
//PRODUCTS
>>>>>>> 0402cdc3e7cbb815fa1c5835c4651245baa53599
Route::get('/', [productsController::class, 'index_all'])->name('products');
Route::post('/', [productsController::class, 'store'])->name('products');
Route::get('/products/{id}', [productsController::class, 'show'])->name('products-edit');
Route::patch('/products/{id}', [productsController::class, 'update'])->name('products-update');

Route::delete('/products/{id}', [productsController::class, 'destroy'])->name('products-destroy');

Route::delete('/products/{id}', [productsController::class, 'destroy'])->name('products-destroy');

//COMANDES
Route::get('/comands', [OrderController::class,'comandes'])->name('comands');

Route::delete('/products/{id}', [productsController::class, 'destroy'])->name('products-destroy');

//TICKETS
Route::get('/tickets', [TicketController::class, 'index_all'])->name('tickets');
<<<<<<< HEAD
Route::get('/ticket/{id}', [TicketController::class, 'showWeb'])->name('tickets-update');
=======
Route::post('/tickets', [TicketController::class, 'store'])->name('tickets');
Route::get('/tickets{id}', [TicketController::class, 'show'])->name('tickets-edit');
Route::patch('/ticket/{id}', [TicketController::class, 'update'])->name('tickets-update');
Route::delete('/ticket/{id}', [TicketController::class, 'destroy'])->name('tickets-destroy');
>>>>>>> 0402cdc3e7cbb815fa1c5835c4651245baa53599


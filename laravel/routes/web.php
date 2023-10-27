<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productsController;
use App\Http\Controllers\TicketController;
use PHPUnit\Framework\Attributes\Ticket;

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
Route::get('/ticket', function () {
    return view('tickets.show');
});






Route::get('/', [productsController::class, 'index_all'])->name('products');
Route::post('/', [productsController::class, 'store'])->name('products');
Route::get('/products/{id}', [productsController::class, 'show'])->name('products-edit');
Route::patch('/products/{id}', [productsController::class, 'update'])->name('products-update');
Route::delete('/products/{id}', [productsController::class, 'destroy'])->name('products-destroy');

Route::post('/', [TicketController::class, 'store'])->name('tickets');
Route::get('/tickets', [TicketController::class, 'index_all'])->name('tickets');
Route::get('/ticket/{id}', [TicketController::class, 'showWeb'])->name('tickets-update');

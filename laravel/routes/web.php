<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productsController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;

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

Route::post('/register', function () {
    return view('register.register');
})->name('register');

Route::post('/login', function () {
    return view('register.login');
})->name('login');

Route::group(['middleware' => ["auth:sanctum"]], function() {
    Route::get('user-profile', [UserController::class, 'userProfile']);
    Route::get('logout', [UserController::class, 'logout']);

    //PRODUCTS
    Route::get('/products/{id}', [productsController::class, 'show'])->name('products-edit');
    Route::patch('/products/{id}', [productsController::class, 'update'])->name('products-update');   
    Route::delete('/products/{id}', [productsController::class, 'destroy'])->name('products-destroy');
    
    //TICKETS
    Route::get('/tickets/{id}', [TicketController::class, 'show'])->name('tickets-edit');
    Route::patch('/ticket/{id}', [TicketController::class, 'update'])->name('tickets-update');
    Route::delete('/ticket/{id}', [TicketController::class, 'destroy'])->name('tickets-destroy');
    
});

Route::get('/', [productsController::class, 'index_all'])->name('products');
Route::post('/', [productsController::class, 'store'])->name('products');
Route::get('/tickets', [TicketController::class, 'index_all'])->name('tickets');
Route::post('/tickets', [TicketController::class, 'store'])->name('tickets');
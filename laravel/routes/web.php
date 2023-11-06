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

// Ruta para mostrar el formulario de registro
Route::get('/register', function () {
    return view('register.register');
})->name('register');

// Ruta para procesar el formulario de registro
Route::post('/register', [UserController::class, 'register']);

// Ruta para mostrar el formulario de inicio de sesión
Route::get('/login', function () {
    return view('register.login');
})->name('login');

// Ruta para procesar el inicio de sesión
Route::post('/login', [UserController::class, 'login']);

// Grupo de rutas protegidas por autenticación
Route::group(['middleware' => ["auth:sanctum"]], function() {
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

// Ruta de inicio por defecto, muestra la vista de inicio de sesión
Route::get('/', function () {
    return view('register.login');
})->name('home');

// Resto de rutas de productos y tickets protegidas por autenticación
Route::get('/products', [productsController::class, 'index_all'])->name('products');
Route::post('/products', [productsController::class, 'store']);
Route::get('/tickets', [TicketController::class, 'index_all'])->name('tickets');
Route::post('/tickets', [TicketController::class, 'store']);
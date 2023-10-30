<?php

use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

///PUBLIC ROUTES
Route::get('/index', [productsController::class, 'index']);

// Route::get('/comandes', [productsController::class, 'comdandes']);
// Route::get('/indexComand', [OrderController::class, 'comandes']);

//Route::post('/insertar-datos', productsController::class);

Route::get('/ticket/{id}', [TicketController::class, 'show']);
Route::get('/tickets', [TicketController::class, 'index']);

// Route::get('/comandes', [productsController::class, 'comdandes']);
// Route::get('/indexComand', [OrderController::class, 'comandes']);

//Route::post('/insertar-datos', productsController::class);

Route::get('/ticket/{id}', [TicketController::class, 'show']);
Route::get('/tickets', [TicketController::class, 'index']);

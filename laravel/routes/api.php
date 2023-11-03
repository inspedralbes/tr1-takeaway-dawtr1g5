<?php

use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productsController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;

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

// Route::get('register', [UserController::class, 'register']);
// Route::get('login', [UserController::class, 'login']);

// Route::group(['middleware' => ["auth:sanctum"]], function() {
//     Route::get('user-profile', [UserController::class, 'userProfile']);
//     Route::get('logout', [UserController::class, 'logout']);
// });

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

///PUBLIC ROUTES
Route::get('/index', [productsController::class, 'index']);
Route::get('/index/{id}', [productsController::class, 'index_single']);
//Route::post('/insertar-datos', productsController::class);

Route::post('/ticket', [TicketController::class, 'store']);
// Route::get('/ticket/{id}', [TicketController::class, 'show']);
// Route::get('/tickets', [TicketController::class, 'index_all']);


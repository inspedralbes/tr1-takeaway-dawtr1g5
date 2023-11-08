<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productsController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\genresController;

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

//PROTECTED ROUTES
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

//PUBLIC ROUTES 'PRODUCTS'
Route::get('/index', [productsController::class, 'index']);
Route::get('/index/{id}', [productsController::class, 'index_single']);
Route::get('/index_pg', [productsController::class, 'index_paginated']);
Route::post('/index_adv', [productsController::class, 'index_adv']);

//PUBLIC ROUTES 'TICKETS'
Route::post('/ticket', [TicketController::class, 'store']);
Route::get('/ticket/{id}', [TicketController::class, 'showOne_Ticket']);
Route::get('/ticketLast', [TicketController::class, 'getLastTicket']);

//PUBLIC ROUTES 'GENRES'

Route::get('/genres', [genresController::class, 'index']);

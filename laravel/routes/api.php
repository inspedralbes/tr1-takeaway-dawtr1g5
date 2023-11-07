<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productsController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\genresController;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

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
//PRODUCTS
Route::get('/index', [productsController::class, 'index']);
Route::get('/index/{id}', [productsController::class, 'index_single']);
Route::get('/index_pg', [productsController::class, 'index_paginated']);
Route::post('/index_adv', [productsController::class, 'index_adv']);

//TICKET
Route::post('/ticket', [TicketController::class, 'store']);
Route::get('/ticket/{id}', [TicketController::class, 'showOne_Ticket']);
Route::get('/ticketLast', [TicketController::class, 'getLastTicket']);

///GENRES
Route::get('/genres', [genresController::class, 'index']);




Route::post('/tokens/create', function (Request $request) {

    $token = $request->user()->createToken($request->token_name);

    return ['token' => $token->plainTextToken];

});



// //El middleware de capacidades se puede asignar a una ruta para verificar que el token de la solicitud entrante tenga todas las capacidades enumeradas
// Route::get('/orders', function () {
    
// })->middleware(['auth:sanctum', 'abilities:check-status,place-orders']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);
 
    $user = User::where('email', $request->email)->first();
 
    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }
 
    return $user->createToken($request->device_name)->plainTextToken;
});
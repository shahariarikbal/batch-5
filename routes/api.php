<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/add/to/cart', [ApiController::class, 'addToCart']);
Route::get('/get/new/arrival/products', [ApiController::class, 'getNewArrivalProducts']);
Route::get('/cart/products', [ApiController::class, 'cartProducts']);
Route::post('/cart/product/update/{id}', [ApiController::class, 'cartProductUpdate']);
Route::get('/cart/product/delete/{id}', [ApiController::class, 'cartProductDelete']);

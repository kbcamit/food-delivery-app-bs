<?php

use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\RiderController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/rider/create', [RiderController::class, 'create']);
Route::get('/rider/get-riders/{restaurant_id}', [RiderController::class, 'getRiders']);
Route::post('/restaurant/create', [RestaurantController::class, 'create']);

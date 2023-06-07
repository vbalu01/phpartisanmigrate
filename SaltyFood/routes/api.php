<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::group(['middleware' => 'auth:user,courier,restaurant,admin'], function () {
    Route::POST('/User/completeOrder',[App\Http\Controllers\MainController::class,'completeOrder'])->name("User_completeOrder");
});

Route::post('/shoppingCartData', [App\Http\Controllers\dbController::class,'getShoppingCartData']);
Route::post('/completeOrder', [App\Http\Controllers\dbController::class,'completeOrder']);
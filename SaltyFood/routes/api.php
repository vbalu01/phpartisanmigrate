<?php

use App\Models\PushSubscription;
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
Route::post('/updateCategory', [App\Http\Controllers\AdminController::class,'updateCategory']);
Route::post('/updateFood', [App\Http\Controllers\AdminController::class,'updateFood']);
Route::post('/addFood', [App\Http\Controllers\AdminController::class,'addFood']);
Route::post('/addNewCategory', [App\Http\Controllers\AdminController::class,'addNewCategory']);
Route::post('/updateCourierStatus', [App\Http\Controllers\AdminController::class,'updateCourierStatus']);
Route::post('push-subscribe', function(Request $request)  {
    PushSubscription::create([
        'data'=>$request->getContent()
    ]);
});
Route::post('/updateAddress', [App\Http\Controllers\dbController::class,'updateAddress']);
Route::post('/addNewAddress', [App\Http\Controllers\dbController::class,'addNewAddress']);
<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', function () {
    if (Auth::guard('user')->check()||Auth::guard('courier')->check()||Auth::guard('restaurant')->check()||Auth::guard('admin')->check()) {
        return redirect('/User');
    }
    if ((Session::get('wronglogin'))==true) {
        return view('login',['wronglogin'=>true]);
    }else
    {
        return view('login',['wronglogin'=>false]);
    }
})->name('login');

Route::get('/register', function () {
    if (Auth::guard('user')->check()||Auth::guard('courier')->check()||Auth::guard('restaurant')->check()||Auth::guard('admin')->check()) {
        return redirect('/');
    }else
    {
        return view('register',['wronglogin'=>false]);
    }

})->name('register');


Route::post('/logincheck', [\App\Http\Controllers\authController::class,'login']);
Route::post('/registercheck', [\App\Http\Controllers\authController::class,'userRegister']);
Route::group(['middleware' => 'auth:user,courier,restaurant,admin'], function () {
    Route::get('/logout',[App\Http\Controllers\authController::class,'logout']);
    Route::get('/User',[App\Http\Controllers\MainController::class,'mainPage']);
    Route::get('/User/shop',[App\Http\Controllers\MainController::class,'shoppingPage'])->name('User_shop');
    Route::get('/User/shoppingCart',[App\Http\Controllers\MainController::class,'shoppingCartPage'])->name('User_shoppingCart');
    Route::get('/User/payment',[App\Http\Controllers\MainController::class,'paymentPage'])->name('User_payment');
    Route::POST('/User/filter',[App\Http\Controllers\MainController::class,'main_filter_cat'])->name("User_main_filter_cat");
    Route::POST('/User/shop/filter',[App\Http\Controllers\MainController::class,'shop_filter_vend'])->name("User_store_filter_vendor");
});




Route::get('/',[App\Http\Controllers\MainController::class,'mainPage'])->name('main');
Route::get('/shop',[App\Http\Controllers\MainController::class,'shoppingPage'])->name('shop');
Route::get('/shoppingCart',[App\Http\Controllers\MainController::class,'shoppingCartPage'])->name('shoppingCart');
Route::get('/payment',[App\Http\Controllers\MainController::class,'paymentPage'])->name('payment');
Route::POST('/filter',[App\Http\Controllers\MainController::class,'main_filter_cat'])->name("main_filter_cat");
Route::POST('/shop/filter',[App\Http\Controllers\MainController::class,'shop_filter_vend'])->name("store_filter_vendor");

Route::get('/teszt',[App\Http\Controllers\dbController::class,'teszt']);
Route::post('addNewFood', [App\Http\Controllers\dbController::class,'addNewFood']);


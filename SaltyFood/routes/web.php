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

//////////////////////Mindenki/////////////////////////////////////////////////////
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

    Route::get('/registerCourier', function () {
        if (Auth::guard('user')->check()||Auth::guard('courier')->check()||Auth::guard('restaurant')->check()||Auth::guard('admin')->check()) {
            return redirect('/');
        }else
        {
            return view('registerCourier',['wronglogin'=>false]);
        }

    })->name('register');

    Route::get('/registerRestaurant', function () {
        if (Auth::guard('user')->check()||Auth::guard('courier')->check()||Auth::guard('restaurant')->check()||Auth::guard('admin')->check()) {
            return redirect('/');
        }else
        {
            return view('registerRestaurant',['wronglogin'=>false]);
        }

    })->name('register');
    Route::post('/logincheck', [\App\Http\Controllers\authController::class,'login']);
    Route::post('/registercheck', [\App\Http\Controllers\authController::class,'userRegister']);
    Route::post('/registercheckCourier', [\App\Http\Controllers\authController::class,'courierRegister']);
    Route::post('/registercheckRestaurant', [\App\Http\Controllers\authController::class,'restaurantRegister']);
    Route::get('/',[App\Http\Controllers\MainController::class,'mainPage'])->name('main');
    Route::get('/shop',[App\Http\Controllers\MainController::class,'shoppingPage'])->name('shop');
    Route::get('/shoppingCart',[App\Http\Controllers\MainController::class,'shoppingCartPage'])->name('shoppingCart');
    Route::get('/payment',[App\Http\Controllers\PaymentController::class,'paymentPage'])->name('payment');
    Route::POST('/filter',[App\Http\Controllers\MainController::class,'main_filter_cat'])->name("main_filter_cat");
    Route::POST('/shop/filter',[App\Http\Controllers\MainController::class,'shop_filter_vend'])->name("store_filter_vendor");
    Route::get('/notify',[App\Http\Controllers\DashController::class,'notifyEveryone']);
//////////////////////Mindenki/////////////////////////////////////////////////////

///////////////////////Bejelentkezett/////////////////////////////////////////////////////
    Route::group(['middleware' => 'auth:user,courier,restaurant,admin'], function () {
        Route::get('/logout',[App\Http\Controllers\authController::class,'logout']);
        Route::get('/User',[App\Http\Controllers\MainController::class,'mainPage']);
        Route::get('/User/shop',[App\Http\Controllers\MainController::class,'shoppingPage'])->name('User_shop');
        Route::POST('/User/filter',[App\Http\Controllers\MainController::class,'main_filter_cat'])->name("User_main_filter_cat");
        Route::POST('/User/shop/filter',[App\Http\Controllers\MainController::class,'shop_filter_vend'])->name("User_store_filter_vendor");
    });
///////////////////////Bejelentkezett/////////////////////////////////////////////////////

/////////////////////////Futár éterem admin///////////////////////////////////////////////////////
    Route::group(['middleware' => 'auth:courier,restaurant,admin'], function () {
        Route::get('/Dashboard',[App\Http\Controllers\DashController::class,'Dashpage']);
    });
/////////////////////////Futár éterem admin///////////////////////////////////////////////////////

//////////////////////User   Admin/////////////////////////////////////////////////
    Route::group(['middleware' => 'auth:user,admin'], function () {
        Route::get('/User/shoppingCart',[App\Http\Controllers\MainController::class,'shoppingCartPage'])->name('User_shoppingCart');
        Route::get('/User/payment',[App\Http\Controllers\PaymentController::class,'paymentPage'])->name('User_payment');
    });
//////////////////////User   Admin/////////////////////////////////////////////////

/////////////////////////Futár///////////////////////////////////////////////////////
    Route::group(['middleware' => 'auth:courier'], function () {
        Route::get('/Dashboard/Courier',[App\Http\Controllers\CurierController::class,'courierDash'])->name("futarDash");
        Route::post('/Dashboard/Courier/getorders',[App\Http\Controllers\CurierController::class,'getOrders']);
        Route::post('/Dashboard/Courier/acceptOrder',[App\Http\Controllers\CurierController::class,'acceptOrder']);
        Route::get('/Dashboard/Courier/OngoingDelivery',[App\Http\Controllers\CurierController::class,'ongoingDelivery']);
        Route::post('/Dashboard/Courier/updateDelivery',[App\Http\Controllers\CurierController::class,'UpdateDelivery']);

    });
/////////////////////////Futár///////////////////////////////////////////////////////

/////////////////////////Éterem///////////////////////////////////////////////////////
    Route::group(['middleware' => 'auth:restaurant'], function () {
        Route::get('/Dashboard/Restaurant',[App\Http\Controllers\DashController::class,'restaurantDash']);
        Route::get('/Dashboard/Restaurant/insertMenu',[App\Http\Controllers\DashController::class,'insertMenuForm']);
        Route::get('/Dashboard/Restaurant/updateMenu/{id}',[App\Http\Controllers\DashController::class,'editRestaurantForm']);
        Route::get('/Dashboard/Restaurant/updateOrder/{id}',[App\Http\Controllers\DashController::class,'editOrderForm']);
        Route::post('updateMenu/{id}',[App\Http\Controllers\DashController::class,'editRestaurant']);
        Route::post('updateOrder/{id}',[App\Http\Controllers\DashController::class,'editOrder']);
        Route::post('createMenu', [App\Http\Controllers\DashController::class,'insertFood']);
        Route::get('/Dashboard/Restaurant/insertOrder',[App\Http\Controllers\DashController::class,'insertOrderForm']);
    });
/////////////////////////Éterem///////////////////////////////////////////////////////

/////////////////////////Admin///////////////////////////////////////////////////////
    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/Dashboard/Admin',[App\Http\Controllers\DashController::class,'adminDash']);
        Route::get('/Dashboard/Admin/menuUpdate/{restaurantId}',[App\Http\Controllers\DashController::class,'adminUpdateMenuPage']);
    });
/////////////////////////Admin///////////////////////////////////////////////////////

/////////////////////////User///////////////////////////////////////////////////////
Route::group(['middleware' => 'auth:user'], function () {
    Route::get('/Dashboard/User',[App\Http\Controllers\DashController::class,'userDash']);
});
/////////////////////////Admin///////////////////////////////////////////////////////




///////////////////////////////debug///////////////////////////////////////////
    Route::get('/teszt',[App\Http\Controllers\dbController::class,'teszt']);
    Route::post('addNewFood', [App\Http\Controllers\dbController::class,'addNewFood']);
///////////////////////////////debug///////////////////////////////////////////

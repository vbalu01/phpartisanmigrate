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
        return redirect('/');
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
Route::get('/', function () {
    return view('index');
});

Route::get('/teszt',[App\Http\Controllers\dbController::class,'teszt']);

Route::group(['middleware' => 'auth:user,courier,restaurant,admin'], function () {
    Route::get('/logout',[App\Http\Controllers\authController::class,'logout']);
});

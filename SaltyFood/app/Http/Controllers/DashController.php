<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashController extends Controller
{
    public function Dashpage()
    {
        if (Auth::guard('courier')->check())
        {
            return redirect("/Dashboard/Courier");
        }
        elseif (Auth::guard('restaurant')->check())
        {
            return redirect("/Dashboard/Restaurant");
        }
        elseif (Auth::guard('admin')->check())
        {
            return redirect("/Dashboard/Admin");
        }
    }

    public function courierDash()
    {
        # code...
    }
    public function restaurantDash()
    {
        # code...
    }
    public function adminDash()
    {
        # code...
    }
}

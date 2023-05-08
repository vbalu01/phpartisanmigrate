<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    public function mainPage(Request $request)
    {

        if (Auth::user()!=null) {
            return view('index')->with('data',['loggedIn'=>true,'usermail'=>Auth::user()->email]);
        }else
        {
            return view('index')->with('data',['loggedIn'=>false,'usermail'=>""]);
        }
    }

}

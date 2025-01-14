<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function guest()
    {
        return view('guests.home.index');
    }


    public function user()
    {
        return view('user.home.index');
    }
}

